<%-- 
    Document   : login
    Created on : Sep 23, 2019, 3:04:28 PM
    Author     : ANH
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@ taglib uri="/struts-tags" prefix="s" %>  
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css.css" />
        <title>JSP Page</title>
    </head>
    <body>
        
<s:form action="login.action">  
<s:textfield name="username" label="Name"></s:textfield>  
<s:password name="password" label="Password"></s:password>  
<s:submit value="login"></s:submit>  
</s:form>  

    </body>
</html>
