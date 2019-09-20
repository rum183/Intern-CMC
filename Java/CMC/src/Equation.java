/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
import java.util.Scanner;
/**
 *
 * @author ANH
 */
public class Equation {
    public static void main(String[] args) {
        Scanner input = new Scanner(System.in);
    	System.out.println("Phuong trinh bac 2 co dang: ax^2 + bx + c = 0");
        System.out.print("Nhap a: ");
    	int a = input.nextInt();
    	System.out.print("Nhap b: ");
    	int b = input.nextInt();
    	System.out.print("Nhap c: ");
    	int c = input.nextInt();  
        
        if(a==0){
            if (b==0) {
                if (c==0) {
                    System.out.println("Phuong trinh vo so nghiem!");
                } else {
                    System.out.println("Phuong trinh vo nghiiem!");
                }
                
            } else {
                if(c==0){
                    System.out.println("Phuong trinh co mot nghiem x =0");
                }else{
                    System.out.println("Phuong trinh co mot nghiemx= ");
                }
            }
        
        }else{
            int delta = (b*b) - (4*a*c);
            if(delta<0){
                System.out.println("Phuong trinh vo nghiem");
            }else if(delta == 0){
                System.out.println("Phuong trinh co 1 nghiem kep x = " + (-b/2*a));
            }else{
                System.out.println("Phuong trinh co 2 nghiem:");
                System.out.println("x1 = " + (-b - Math.sqrt(delta)) / (2 * a));
                System.out.println("x2 = " + (-b + Math.sqrt(delta)) / (2 * a));
            }
        }
    }
    
}
