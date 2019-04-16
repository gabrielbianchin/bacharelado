package compilador;

import java.io.File;

public class Generator {

    public static void main(String[] args) {
        String file = "C:/Users/gabri/Documents/NetBeansProjects/compiladores/src/compilador/linguagem.flex";

        File sourceCode = new File(file);

        jflex.Main.generate(sourceCode);

    }
   
    
}