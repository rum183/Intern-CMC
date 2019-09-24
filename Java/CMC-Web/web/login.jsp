<%-- 
    Document   : login
    Created on : Sep 23, 2019, 3:04:28 PM
    Author     : ANH
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css.css" />
        <title>JSP Page</title>
    </head>
    <body>

<div class="content_right" style="width:100%;">
	<h1 align="center"><p class="pr">Đăng nhập</p></h1>
    <form action="login.action" method="post">
    <table width="500"  align="center">
    	<tr>
        	<td>Username</td>
            <td><input type="text" name="username" placeholder="Nhập username..." /></td>
        </tr>
        <tr>
        	<td>Password</td>
            <td><input type="password" name="password" placeholder="Nhập password..." /></td>
        </tr>
        <tr>
        	<td><input type="submit" name="login" value="Đăng Nhập" /></td>

        </tr>
    </table>
</form>

</div>
    </body>
</html>
