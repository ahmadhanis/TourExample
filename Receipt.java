/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package travelntour;

/**
 *
 * @author master lab
 */
public class Receipt {
    String receiptid;
    int num_adult,num_child,pack;
    double total;
    public Receipt(String r,int a,int c, int p) {
        this.receiptid = r;
        this.num_adult = a;
        this.num_child = c;
        this.pack = p;
    }
    void calculate(){
        int price=0;
        if (pack==1){
            int adult  = num_adult * 10;
            int children = 5 * num_child ;
            price = adult + children;
        }
        if (pack ==2){
             int adult  = num_adult * 20;
            int children = 10 * num_child ;
            price = adult + children;
        }
        total = price;
    }
    
    @Override
     public String toString(){
         String tp="";
        if (pack ==1){
            tp = "Guided tour";
        }else{
            tp = "Jungle Trecking";
        }
        String s = "UNI1 Travel \n" +
                    "Receipt No: " +receiptid+"\n"+
                    "Package Selected: " + tp+"\n"+
                    "Number of Adult: " + num_adult+"\n"+
                    "Number of Childrend:" +num_child+"\n"+
                    "Total Payable: RM "+total+"\n";
        return s;
     }
}
