/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Action;

import DB.ConnectDB;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.ArrayList;
import java.util.List;

/**
 *
 * @author ANH
 */
public class getDB {

        public static String  getInfo(String u, String p){
            String usern = u;
            String passw = p;
            String flag = "";

            String sql = "SELECT * FROM user WHERE username ='"+usern+"' AND password = '"+passw+"'";
            ConnectDB connect = new ConnectDB();
            Connection connection = connect.getConnect();

            try {
                PreparedStatement ps = connection.prepareStatement(sql);
                ResultSet rs = ps.executeQuery();
                if(rs.next()){
                    flag="true";
                }else{
                    flag="false";
                }

            } catch (Exception e) {
                e.printStackTrace();
            }

            return flag;
        }
    }
