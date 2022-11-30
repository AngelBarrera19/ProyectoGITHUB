import java.util.Scanner;


public class Recu_Ruso {
    int x,y;
    private String mult_ruso;
Recu_Ruso(int X, int Y){
    this.x=X;
    this.y=Y;
}
int mult_ruso(int X, int Y){
    if (X==1){
        return (Y);
    }
    if(X%2!=0){
        return (Y*mult_ruso(X/2, Y*2));
    }
    else{
        return (mult_ruso ( X/2, Y*2));
    }
}

    public static void main(String[] args) {
        int x,y;
        Scanner xd= new Scanner (System.in);
        System.out.println("INGRESE EL VALOR X: ");
        x=xd.nextInt();
        System.out.println("INGRESE EL VALOR Y: ");
        y=xd.nextInt();
        Recu_Ruso f=new Recu_Ruso (x,y);
        System.out.println("Resultado: "+f.mult_ruso(x,y)) ;
        
}
    }

import java.util.Scanner;


public class Recu_Ruso {
    int x,y;
    private String mult_ruso;
Recu_Ruso(int X, int Y){
    this.x=X;
    this.y=Y;
}
int mult_ruso(int X, int Y){
    if (X==1){
        return (Y);
    }
    if(X%2!=0){
        return (Y*mult_ruso(X/2, Y*2));
    }
    else{
        return (mult_ruso ( X/2, Y*2));
    }
}

    public static void main(String[] args) {
        int x,y;
        Scanner xd= new Scanner (System.in);
        System.out.println("INGRESE EL VALOR X: ");
        x=xd.nextInt();
        System.out.println("INGRESE EL VALOR Y: ");
        y=xd.nextInt();
        Recu_Ruso f=new Recu_Ruso (x,y);
        System.out.println("Resultado: "+f.mult_ruso(x,y)) ;
        
}
    }   
