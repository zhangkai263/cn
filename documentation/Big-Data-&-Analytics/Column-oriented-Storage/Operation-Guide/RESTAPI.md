## 使用REST API访问

REST API解除了语言限制，支持REST风格的HTTP API访问数据库，使用方法请参考RestDemo.java。
```
package com.jd.common;

import java.io.*;
import java.net.MalformedURLException;
import java.net.URL;
import java.net.URLConnection;

/**
 * @author Post Method
 */
public class RestDemo {

    public static String doPost(String urlStr, String strInfo) {
        System.out.println(urlStr);
        String reStr = "";
        try {
            URL url = new URL(urlStr);
            URLConnection con = url.openConnection();
            con.setDoOutput(true);
            con.setRequestProperty("accept", "text/xml");
            con.setRequestProperty("Content-Type", "text/xml");
            OutputStreamWriter out = new OutputStreamWriter(con.getOutputStream());
            out.write(new String(strInfo.getBytes("utf-8")));
            out.flush();
            BufferedReader br = new BufferedReader(new InputStreamReader(con.getInputStream(), "utf-8"));
            String line = "";
            for (line = br.readLine(); line != null; line = br.readLine()) {
                reStr += line;
            }
        } catch (MalformedURLException e) {
            e.printStackTrace();
        } catch (IOException e) {
            e.printStackTrace();
        }
        return reStr;
    }

    public static String doSend(String urlStr ) {
        System.out.println(urlStr);
        String reStr = "";
        try {
            URL url = new URL(urlStr);
            URLConnection con = url.openConnection();
            con.setDoOutput(true);
            con.setRequestProperty("accept", "text/xml");
            BufferedReader br = new BufferedReader(new InputStreamReader(con.getInputStream(), "utf-8"));
            String line = "";
            for (line = br.readLine(); line != null; line = br.readLine()) {
                reStr += line;
            }
        } catch (MalformedURLException e) {
            e.printStackTrace();
        } catch (IOException e) {
            e.printStackTrace();
        }
        return reStr;
    }

    public static void main(String []args) {
        String baseUrl = "http://116.196.81.217:8080";

        System.out.println("创建一张表");
        String postStr = "<?xml version=\"1.0\" encoding=\"UTF-8\"?><TableSchema name=\"testnew\"><ColumnSchema name=\"cf\" /></TableSchema>";
        String urlPath = "/testnew/schema";
        String url = baseUrl+urlPath;
        String result = doPost(url, postStr);

        System.out.println("获取表list");
        urlPath = "";
        url = baseUrl + urlPath;
        result = doSend(url);
        System.out.println(result);

        System.out.println("获取表结构");
        urlPath = "/testnew/schema";
        url = baseUrl + urlPath;
        result = doSend(url);
        System.out.println(result);

        System.out.println("插入数据");
        urlPath = "/testnew/fakerow";
        url = baseUrl + urlPath;
        postStr="<?xml version=\"1.0\" encoding=\"UTF-8\" standalone=\"yes\"?><CellSet><Row key=\"cm93NQo=\"><Cell column=\"Y2Y6ZQo=\">dmFsdWU1Cg==</Cell></Row></CellSet>";
        result = doPost(url, postStr);
        System.out.println(result);

        System.out.println("获取数据");
        urlPath = "/testnew/*";
        url = baseUrl + urlPath;
        result = doSend(url);
        System.out.println(result);
    }
}
```
