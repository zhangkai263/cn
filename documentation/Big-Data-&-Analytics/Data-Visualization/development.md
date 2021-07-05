---
title: 产品开发者手册
order: 5
---


# 开发者文档

## 安装

### 1. 安装jnpm

由于莫奈的开发者插件在京东的私有npm上，故需要安装jnpm

> [jnpm安装说明地址](http://npm.m.jd.com/)

### 2. 安装开发者插件monet-studio

- Install: jnpm i -g @jd/monet-studio
- Usage: monet-studio [options] [command]

> jnpm 仅限京东内部用户使用，外网用户使用： `npm i -g http://storage.360buyimg.com/npmjs/monet-studio-outer-0.6.5.tgz`

```
monet chart runtime for developer

Options:
  -V, --version       output the version number
  -h, --help          display help for command

Commands:
  init [projectName]  init monet-charts monorepos project
  start               start up one chart component
  build [options]     build one chart component to dist/<version>
  report [options]    build one chart component and generate bundle analyze report
  help [command]      display help for command

Example:
  $ monet-studio init
  $ monet-studio start
  $ monet-studio build
  $ monet-studio report
  $ monet-studio build -p http://storage.urban-computing.cn/monet-charts
    current chart component will deploy to http://storage.urban-computing.cn/monet-charts

```

## 开发

### 1、准备工作

> 可参考仓库 [https://git.jd.com/web-uc-weapons/monet-charts](https://git.jd.com/web-uc-weapons/monet-charts)

- 初始化自定义组件仓库
  1. monet-studio init [projectName] // 初始化项目
  2. cd [projectName]/packages/demo  // 找到组件目录
  3. npm install // 安装依赖
  4. monet-studio start // 启动
- 这时我们在[projectName]项目中得到如下目录结构
-

```
├── .eslintrc.js
├── README.md
├── deploy.sh 打包脚本
├── package.json
└── packages  自定义组件集合
    └── demo <组件名>
        ├── README.md 组件说明文档
        └── package.json 组件名、版本号、组件依赖包[不包括 react + mobx 技术栈相关框架]

```

### 2、开发组件

我们需要在demo文件夹下新建一个文件夹（lib），并新建两个文件（index.js和setting.js），完成后目录结构如下

需要注意的是：组件名=文件名=code，命名规则使用小驼峰 <大分类>_<组件名>

以demo组件为例，即文件夹为demo，组件名也叫demo，组件的code也叫demo

```
├── .eslintrc.js
├── README.md
├── deploy.sh
├── lerna.json
├── package.json
└── packages
    └── demo
        ├── README.md
        ├── lib 新加文件夹
        │   ├── index.js 新建文件，这里写具体的自定义组件业务逻辑
        │   └── setting.js 新建文件，这里是自定义组件的配置信息
        └── package.json
```

package.json 文件扩展参数， config是组件在初始化时所必须的配置数据

```
{
    "name": "custom_component_code" //组件name需以custom_开头
    "version": "1.0.0",
    "description": "组件描述",
    "author": "yourname@jd.com",
    "config": {
       "name": "组件名称",
       "width": 400,
       "height": 300
    }
}
```


这时我们需要cd到当前组件（demo下）的目录中，使用命令npm start启动项目，开始自定义组件的开发了

> 开发过程中需要注意的几个问题

> 1. setting.js会读取当前组件的package.json中的name和version字段，name字段作为code用，所以pakage.json中的name字段 = setting 中code = 组件名 = 文件夹名， 否则加载不出来。

> 2. 关于code的问题：即package.json 中的name字段。code是组件的唯一标识，我们通过组件的code和版本version来唯一确定一个组件。

> 3. 组件集市中的组件描述会先读取README.md中的内容作为显示，如果README.md文件不存在会读取package.json文件中的description字段内容作为显示。

### 3、打包

开发完成之后npm run build 打包组件

打完包之后，会和lib同级的生成一个dist文件，目录如下

```
...

│── dist 打包后的资源
│   └──1.0.0
│		│── index.js
│       │── static
│       └────└── image 图片资源等
│            └── ..... 其他资源
│── README.md
└── package.json
...
```



### 4、发布


#### 自动打包发布

使用 `npm run deploy` 打包并压缩成 custom_xxx.zip 文件，此压缩文件包括dist、README.md、package.json，可以作为代码包上传到莫奈开放平台。

#### 手动打包上传

使用 npm run build 生成 dist 文件夹，将 dist、README.md、package.json 放到一个文件夹中，**文件夹以组件 code 命名**，然后打包该文件夹为.zip包，在莫奈开放平台上进行发布。
# 组件指南

## 组件demo

### lib/index.js

```jsx
import setting from './setting.js';

function Demo(props) {
  const { width, height, config, data } = props;
  // config = { theme: 'square', angle: 45, isProd: true }
  // todo
  return (<div style={{ width, height }}>
    // todo
  </div>);
}

Demo.setting = setting;
// 自定义配置项
Demo.styleConfig = {
  EnvSwitch: ({ value, onChange }) => (
    <div onClick={() => { onChange(!value); }}>
      {value ? 'production' : 'test'}
    </div>
  )
};

export default Demo;
```

1. props



	名称|类型|备注
	--|--|--
	width|number|组件宽度
	height|number|组件高度
	config|object|setting.js 中的 config 字段转换的 object `{ theme: 'square', angle: 45, isProd: true }`， 见 setting.config。
	data|`<array|object>`|setting.js 中 data 转换的值 `[{ name: '上海', value: 40 }]`， 见 setting.data
	bigScreen|`<mobx store>`|大屏 store

2. 大屏输出组件必须是 ReactElement 组件， 且组件上需要有 setting 属性


### lib/setting.js

```js
export default {
  width: 100,
  height: 100,
  coordinate: {
    x: 0,
    y: 0
  },
  config: [{
    name: '主题样式',
    code: 'theme',
    value: 'square',
    type: 'Radio',
    enumValue: [
      {
        key: '矩形',
        value: 'square'
      },
      {
        key: '圆形',
        value: 'circle'
      },
      {
        key: '平行四边形',
        value: 'rect'
      }
    ]
  },
  {
    name: '背景投影角度',
    code: 'angle',
    value: 45,
    type: 'InputNumber',
    min: 0,
    max: 360
  }, {
    name: '自定义配置项',
    code: 'isProd',
    type: 'EnvSwitch',
    value: true,
  }],
  data: {
    interval: 5,
    polling: 0,
    field: [
      { name: 'name', mapper: 'city' },
      { name: 'value', mapper: 'value' }
    ],
    type: 1,
    value: JSON.stringify([
      { city: '上海', value: 40 }
    ])
  }
}
```

1. config 字段说明

| 名称  | 说明                                                         |
| ----- | ------------------------------------------------------------ |
| name  | 配置项名称                                                   |
| code  | 对应 config 的 key                                           |
| value | 对应 config 的值                                             |
| type  | 配置项所使用的组件类型， 具体支持的type组件详见下面第二条说明 |
| min   | type = 'InputNumber' 时对应的最小值                          |
| max   | type = 'InputNumber' 时对应的最大值                          |

2. config的type字段对应的组件类型

   | type          | 相应的组件                                                   |
   | ------------- | ------------------------------------------------------------ |
   | Input         | 字符串输入框                                                 |
   | InputNumber   | 浮点数输入框                                                 |
   | ColorSelector | 颜色选择器                                                   |
   | Select        | 下拉框选择                                                   |
   | CheckBox      | 多选框                                                       |
   | Radio         | 单选框                                                       |
   | ImgUpdate     | 图片上传组件                                                 |
   | FontGroup     | 文本框设置器，包括文字颜色，大小，字体类型，字体粗细四个设置 |
   | CustomColors  | 自定义的多个颜色选择器                                       |
   | AddConfig     | 添加配置项容器                                               |


## 基础组件样式配置

### 1. Input

 | 名字 | 类型 | 说明
 | ------------ | ------------ | ------------ |
 | name | String | 配置项名称
 | code | String | 对应配置项的key
 | value | String | 配置项对应内容值
 | max | Number | 输入框内最大字符数

**在setting中的配置示例**

```
{
  name: '单位(10字以内)',
  code: 'name',
  type: 'Input',
  value: '',
  max: 10
}
```

### 2. InputUrl

 | 名字 | 类型 | 说明
 | ------------ | ------------ | ------------ |
 | name | String | 配置项名称
 | code | String | 对应配置项的key
 | value | String | 配置项对应内容值

**在setting中的配置示例**

```
{
  name: 'API地址',
  code: 'apiUrl',
  type: 'InputUrl',
  value: 'http://...'
}
```

### 3. InputNumber

 | 名字 | 类型 | 说明
 | ------------ | ------------ | ------------ |
 | name | String | 配置项名称
 | code | String | 对应配置项的key
 | value | Number | 配置项对应内容值
 | max | Number | 最大值
 | min | Number | 最小值
 | unit | String | 内容值的单位

**在setting中的配置示例**

```
{
  name: '边框粗细',
  code: 'borderWidth',
  type: 'InputNumber',
  min: 0,
  max: 10,
  value: 1,
  unit: 'px'
}
```

### 4. Select

 | 名字 | 类型 | 说明
 | ------------ | ------------ | ------------ |
 | name | String | 配置项名称
 | code | String | 对应配置项的key
 | value | String | 默认选中的选项值
 | enumValue | Array[Object] | 选项值

**在setting中的配置示例**

```
{
  name: '3D球体样式',
  code: 'custom',
  type: 'Select',
  value: 'baseSatellite',
  enumValue: [
    { value: 'baseSatellite', key: '卫星风格' },
    { value: 'baseGray', key: '灰色风格' },
    { value: 'baseBlue', key: '蓝色风格' }
  ],
}
```

### 5.ColorSelector

 | 名字 | 类型 | 说明
 | ------------ | ------------ | ------------ |
 | name | String | 配置项名称
 | code | String | 对应配置项的key
 | value | String | 配置项对应内容值

**在setting中的配置示例**

```
{
  name: '字体颜色',
  code: 'color',
  type: 'ColorSelector',
  value: '#fff',
}
```

### 6. CheckBox

 | 名字 | 类型 | 说明
 | ------------ | ------------ | ------------ |
 | name | String | 配置项名称
 | code | String | 对应配置项的key
 | value | Boolean | 配置项对应内容值

**在setting中的配置示例**

```
{
  name: '智能隐藏',
  code: 'interval',
  type: 'CheckBox',
  value: false,
}
```

### 7. Radio

 | 名字 | 类型 | 说明
 | ------------ | ------------ | ------------ |
 | name | String | 配置项名称
 | code | String | 对应配置项的key
 | value | String | 配置项对应内容值
 | enumValue | Array[Object] | 选项值

**在setting中的配置示例**

```
{
  name: '对齐方式',
  code: 'textAlign',
  type: 'Radio',
  value: 'center',
  enumValue: [
    { key: '左', value: 'left' },
    { key: '中', value: 'center' },
    { key: '右', value: 'right' }
  ]
}
```

### 8. ImgSelect

 | 名字 | 类型 | 说明
 | ------------ | ------------ | ------------ |
 | name | String | 配置项名称
 | code | String | 对应配置项的key
 | value | String | 配置项对应内容值
 | enumValue | Array[Object] | 选项值

**在setting中的配置示例**

```
{
  name: '标题样式',
  code: 'img',
  type: 'ImgSelect',
  value: './image1.png' ,
  enumValue: [
    { name: '标题1', img: './image1.png' },
    { name: '标题2', img: './image2.png' },
    { name: '标题3', img: './image3.png' }
  ]
}
```


### 9. FontSelect

 | 名字 | 类型 | 说明
 | ------------ | ------------ | ------------ |
 | name | String | 配置项名称S
 | code | String | 对应配置项的key
 | value | String | 配置项对应内容值
 | enumValue | Array[Object] | 选项值

**在setting中的配置示例**

```
{
  name: '散点样式',
  code: 'shape',
  type: 'FontSelect',
  value: 'location',
  enumValue: [
    { name: '类型1', img: 'location' },
    { name: '类型2', img: 'markercircle-copy' },
    { name: '类型3', img: 'triangle' },
  ]
}
```

### 10. PieceSelect

 | 名字 | 类型 | 说明
 | ------------ | ------------ | ------------ |
 | name | String | 配置项名称
 | code | String | 对应配置项的key
 | value | String | 配置项对应内容值
 | enumValue | Array[Object] | 选项值

**在setting中的配置示例**

```
    {
      name: '边框样式',
      code: 'theme',
      type: 'PieceSelect',
      value: 'square',
      enumValue: [
        { name: '矩形', img: './image1.png', type: 'square' },
        { name: '切角矩形1', img: './image2.png', type: 'squareOne' },
        { name: '切角矩形2', img: './image3.png', type: 'squareTwo' },
      ]
    }
```

### 11. CitySelect

 | 名字 | 类型 | 说明
 | ------------ | ------------ | ------------ |
 | name | String | 配置项名称
 | code | String | 对应配置项的key
 | value | String | 配置项对应内容值
 | options | {provinceValue:[],cityValue:[],countyValue:[]} | 选项值(可选)

**在setting中的配置示例**

```
{
  name: '默认城市',
  code: 'cityDefault',
  type: 'CitySelect',
  value: '',
  options: {
    provinceValue: [{
      key: '请选择省份',
      value: ''
    }],
    cityValue: [{
      key: '请选择城市',
      value: ''
    }],
    countyValue: [{
      key: '请选择县/区',
      value: ''
    }]
  }
}

```

### 12. DateRange

 | 名字 | 类型 | 说明
 | ------------ | ------------ | ------------ |
 | code | String | 对应配置项的key
 | value | Object | 配置项对应内容值

**在setting中的配置示例**

```
{
  code: 'setup',
  type: 'DateRange'
  value: {
    startDate: nowDate,
    endDate: nowDate,
    interval: 'date',
    format: 'YYYY年MM月DD日'
  },
}
```

### 13. DatePicker

 | 名字 | 类型 | 说明
 | ------------ | ------------ | ------------ |
 | code | String | 对应配置项的key
 | value | Object | 配置项对应内容值

**在setting中的配置示例**

```
{
  code: 'setup',
  type: 'DatePicker'
  value: {
    date: nowDate,
    interval: 'date',
    format: 'YYYY年MM月DD日'
  },
}
```

### 14. MaxMinValue

 | 名字 | 类型 | 说明
 | ------------ | ------------ | ------------ |
 | name | String | 配置项名称
 | code | String | 对应配置项的key
 | value | Number | 配置项对应内容值

**在setting中的配置示例**

```
{
  code: 'maxMinSize',
  type: 'MaxMinValue',
  current: 'chartBubble',
  value: '30-55',
}
```

### 15. FontGroup

 | 名字 | 类型 | 说明
 | ------------ | ------------ | ------------ |
 | name | String | 配置项名称
 | code | String | 对应配置项的key
 | value | Object | 配置项对应内容值(包括文字颜色,大小,字体类型,字体粗细)

**在setting中的配置示例**

```
{
  name: '文本设置',
  code: 'font',
  type: 'FontGroup',
  value: {
    fontSize: 12,
    fontFamily: 'siyuan',
    color: '#FFF',
    fontWeight: 'normal'
  }
}
```


### 16. CustomColors

 | 名字 | 类型 | 说明
 | ------------ | ------------ | ------------ |
 | name | String | 配置项名称
 | code | String | 对应配置项的key
 | value | String | 配置项对应内容值

**在setting中的配置示例**

```
{
  name: '颜色设置',
  code: 'color',
  type: 'CustomColors',
  value: '#022CB2',
}
```

### 17. RangeColors

 | 名字 | 类型 | 说明
 | ------------ | ------------ | ------------ |
 | name | String | 配置项名称
 | code | String | 对应配置项的key
 | value| Array[Object] |
 | template| Object | 添加时默认的value数据对象

**在setting中的配置示例**

```
{
  name: '填充颜色（0-100）',
  code: 'colors',
  type: 'RangeColors',
  min: 1,
  max: 100,
  rangeKey: 'value',
  tip: '数值范围代表百分比',
  value: [
  {
    id: 999,
    start: 20,
    end: 80,
    color: '#2973FF'
  },
  {
    id: 998,
    start: 80,
    end: 100,
    color: '#D75924'
  }],
  template: {
    start: 80,
    end: 100,
    color: '#D75924',
  }
}
```

## 组合组件样式配置

### 1. AddConfig


 | 名字 | 类型 | 说明
 | ------------ | ------------ | ------------ |
 | series| Array[Object] | 基础组件的默认配置
 | value| Array[Object] | 多个由基础组件value值生成的数据对象
 | template | Object | 添加时默认的value数据对象
 | max| Number | 最多数据对象个数、value的最大长度
 | min| Number | 最少数据对象个数、value的最小长度
 | themePath | Array[Object] | 数据对象的主题颜色路径


**在setting中的配置示例**

 ```
{
  name: '列特殊行配置',
  type: 'AddConfig',
  code: 'special',
  value: [],
  min: 0,
  max: 10,
  template: {
    row: 1,
    font: fontConfig.value
  },
  series: [
    {
      name: '行数',
      code: 'row',
      min: 1,
      type: 'InputNumber',
      unit: '行'
    },
    {
      name: '文本设置',
      code: 'font',
      type: 'FontGroup',
    }
  ]
}
 ```

**注册可使用的基础组件**

- `Input`
- `InputNumber`
- `Select`
- `ColorSelector`
- `CheckBox`
- `Radio`
- `FontGroup`
- `ChangeConfig`
- `CustomColors`

### 2. ChangeConfig

 | 名字 | 类型 | 说明
 | ------------ | ------------ | ------------ |
 | name | String | 配置项名称
 | code | String | 对应配置项的key
 | value| Object | 由基础组件value值生成的数据对象
 | enumValue | Array[Object] | 选项值(包含key,value,change(基础组件的默认配置))


**在setting中的配置示例**

```
{
  name: '柱子宽度',
  code: 'columnWidth',
  type: 'ChangeConfig',
  value: {
    type: 'number',
    precent: 30,
    number: 30
  },
  enumValue: [
    {
      key: '自适应',
      value: 'precent',
      change: [
        {
          code: 'precent',
          type: 'InputNumber',
          value: 30,
          min: 1,
          unit: '百分比'
        }
      ]
    },
    {
      key: '自定义',
      value: 'number',
      change: [
        {
          code: 'number',
          type: 'InputNumber',
          value: 30,
          min: 1,
          unit: 'px'
        }
      ]
    }
  ]
}
```

**注册可使用的基础组件**

- `Input`
- `InputNumber`
- `Select`
- `ColorSelector`
- `CheckBox`
- `Radio`
- `FontGroup`
- `ImgUpdate`
- `FontSelect`
- `RangeColors`
- `CustomColors`


> 待开发组件: Progress、NumberSlider

## 主题样式配置方式

- 主题是通过配置组件的setting进行实现，组件主题设置分为两种类型:`config`主题设置和`series`主题设置；
- 组件主题本质是主题配置文件themeConfig中配置了三种主题方案，然后在各个组件中通过themePath设置主题颜色路径来实现主题效果；

> 组件使用主题色时，颜色值value应为空字符串，以便直接去获取主题色；同时注意themePath声明时和value同级配置；

### theme config主题设置

1. 当type对应value为字符串时(`ColorSelector`,`CustomColors`)，themePath为**数组**或者**字符串**以映射返回颜色的字符串，如果是颜色数组则内部函数将其合并为字符串，中间使用'-'拼接实现颜色渐变。

```js
{
  isGlobalControlled: true,
  name: '颜色',
  code: 'color',
  value: '', // '#AAA'
  type: 'ColorSelector',
  themePath: 'themeColor' // '#AAA'
}

{
    isGlobalControlled: true,
    name: '下方(或右侧)胶囊颜色',
    code: 'secondColor',
    value: '', // '#AAA-#BBB'
    type: 'CustomColors',
    themePath: ['themeColorList[0]','themeColorList[1]'] // ['#AAA', '#BBB']
    // 也可以是：themePath: 'themeColorSimilarList[0]' // ['#AAA', '#BBB']
},
```

2. 如果type对应的value为对象类型时(`FontGroup`, `ChangeConfig`)，themePath为**对象**，包含需要映射的颜色路径。

```js
{
  isGlobalControlled: true,
  name: '文本设置',
  code: 'font',
  type: 'FontGroup',
  value: {
    fontSize: 12,
    fontFamily: 'siyuan',
    color: '', // '#FFF'
    fontWeight: 'normal'
  },
  themePath: {
    color: 'lightColorList[1]' // '#FFF'
  }
}
```

3. 如果type对应的value为对象数组时(`AddConfig`)，此时themePath为**对象**，返回的是与value相同大小对象数组，只是会替换空的颜色值：

```js
{
  isGlobalControlled: true,
  code: 'lines',
  type: 'AddConfig',
  min: 1,
  max: 10,
  value: [
    {
      barColor: '', // #AAA
    },
    {
      barColor: '' // #BBB
    },
    {
      barColor: '' // #CCC
    },
    {
      barColor: '' // #DDD
    },
    {
      barColor: '' // #EEE
    }
  ],
  template: {
    barColor: '',
  },
  themePath: {
    barColor: 'themeColorList', // ['#AAA', '#BBB', '#CCC', ...]
  },
  series: [
    {
      name: '柱子颜色',
      code: 'barColor',
      type: 'CustomColors'
    }
  ]
}
```

> 此时如果themePath中定义的主题路径是颜色数组（数组长度大于1），则会循环加载主题颜色。

### theme series主题设置

>  series为数据系列的配置项；seriesDefault为组件初始化时根据series映射出的对象数组

在series中配置themePath，使用方式与config相同，需要注意，当想要每个数据系列按照主题颜色增加变化时，需要将themePath的值设置为**主题数组**，如下：

```js
series: [
  {
     isGlobalControlled: true,
     name: '颜色设置',
     code: 'color',
     value: '',
     type: 'CustomColors',
     themePath: 'themeColorList' // ['#AAA', '#BBB', '#CCC', ...]
  },
],
seriesDefault: [
  {
    color: '' // #AAA
  },
  {
    color: '' // #BBB
  }
]
```

对于value值为对象时，跟随数据系列的颜色可以设置主题色数组，如下：

```js
series: [
  {
     isGlobalControlled: true,
     name: '颜色设置',
     code: 'color',
     type: 'ChangeConfig',
     value: {
       lineColor: '',
       backColor: '',
       ...
     },
     themePath: {
       barColor: 'themeColorList', // ['#AAA', '#BBB', '#CCC', ...]
       lineColor: 'deepColorList[1]' // '#666'
     }
  },
],
seriesDefault: [
  {
    barColor: '', // #AAA
    lineColor: '', // '#666'
    ...
  },
  {
    barColor: '', // #BBB
    lineColor: '', // '#666'
    ...
  },
  {
    barColor: '', // #CCC
    lineColor: '', // '#666'
    ...
  },
]
```

### 主题颜色的可配置选项

 |  主题配置项名称  | 配置项类型 | 配置项含义
 |-----------------|------------|-----------------------|
 | themeColor      |  String | 主题色
 | themeLightColor |  String | 主题色亮色
 | themeColorList  |  Array  | 主题色组，透明度[0.85, 0.65, 0.45, 0.35, 0.25, 0.15, 0.10]
 | lightColor      |  String | 无色相亮色，用于文字
 | lightColorList  |  Array  | 无色相亮色组，透明度[0.85, 0.65, 0.45, 0.25, 0.15]
 | deepColor       |  String | 有色相深色，用于背景边框
 | deepColorList   |  Array  | 有色相亮色组，透明度[0.85, 0.65, 0.45, 0.25, 0.15]
 | **seriesColorList** |  Array  | 主题图表系列色系(数组长度9)
 | **seriesColorSimilarList** |  Array | 主题图表系列色系相近色(双色渐变，透明度[1,0.5])
 | seriesColorSimilarReverseList |  Array |  主题图表系列色系相近色(双色渐变，透明度[0.5,1])

> 配置项含义 代码示例

```js
  // 类型为String
  themeColor: rgb(27,100,238),
  // 类型为Array,以主题色为基础,进行透明度变化
  themeColorList: [rgba(27,100,238,0.85),rgba(27,100,238,0.65),rgba(27,100,238,0.45),...]
  // 类型为Array 主题系列色系
  seriesColorList: [rgb(27,100,238), rgb(11,153,106),...];
  // 类型为Array 主题系列色系相近色,实现双色渐变效果
  seriesColorSimilarList: [[rgba(27,100,238,1), rgba(27,100,238,0.5)], [rgba(11,153,106,1), rgba(11,153,106,0.5)],...];

```

## 组件交互设置

交互组件中的setting中设置events，可以用传出参数的形式与其他组件交互。具体配置如下

```js
{
  config: {},
  data: [{}],

  events: {
    [eventName]: {
      description: 'string', // 描述
      optional: false, // 不立即响应
      fields: {
        [dataKey1]: {
          mapper: '', // default is dataKey
          desc: 'description',
          value: '', // 交互变量缓存
        }
        [dataKey2]: {
          ...
        }
      }

      action: {
          active: false, // 开启交互功能，交互组件默认此字段undefined
          filter: { // 绑定到变量
            description: 'value映射字段',
            mapper: ''
          },
          // v3.2
          useDefault: false, //自定义默认传参数，默认此字段undefined
          default: { // 默认值
            [dataKey1]: '',
            [dataKey2]: '',
          }
      },
    }
  }
}
```

必须在代码中组件constructor中调用bigScreen中的setDataPool来初始化变量，否则会阻塞其他组件的数据请求，比如交互变量默认值为空数据''时；

```jsx
  constructor(props) {
    super(props);
    this.setDataPool('');
  }

  // 更新store中的dataPoll
  setDataPool(value) {
    const {
      bigScreen: { setDataPool },
      events: { click }, path, editable
    } = this.props;

    const dataPoll = { dataKey1: value }; // events中设置的dataKey1

    setDataPool(click, dataPoll, path, editable);
  }
```

如果交互设置需要设置默认数据，则通过action中的default获得：

```jsx
  constructor(props) {
    super(props);
    this.setDataPool(this.valueDefault);
  }
  // 交互变量默认值
  get valueDefault() {
    const { data, events: { click: { action } } } = this.props;
    const dataDefault = data && data.length
      ? data[0].value : ''; // 数据设置中的默认数据
    return action && action.default && action.useDefault
      ? action.default.value : dataDefault;
  }
```

