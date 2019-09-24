/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Action;

import Action.getDB;
import com.opensymphony.xwork2.ActionSupport;

/**
 *
 * @author ANH
 */
public class Login extends ActionSupport{
    
    private String username;
    private String password;

    public String getUsername() {
        return username;
    }

    public void setUsername(String username) {
        this.username = username;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }
    
    @Override
    public String execute(){
        String flag  = getDB.getInfo(username, password);
        return flag;
    }




}
