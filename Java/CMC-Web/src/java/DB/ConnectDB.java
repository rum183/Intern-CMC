package DB;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
import java.sql.Connection;
import java.sql.DriverManager;
/**
 *
 * @author ANH
 */
public class ConnectDB {
    public static Connection getConnect(){
        Connection conn = null;
        String host = "jdbc:mysql://localhost:3306/test";
        String user = "root";
        String pass = "";
        try {
            Class.forName("com.mysql.jdbc.Driver");
            conn = DriverManager.getConnection(host, user, pass);
        } catch (Exception e) {
            e.printStackTrace();
        }
        return conn;
    }
    
}
