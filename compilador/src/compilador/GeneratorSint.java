package compilador;

import java.io.File;

public class GeneratorSint {
    public static void main(String[] args){
        String path = "C:/Users/gabri/Documents/NetBeansProjects/compiladores/src/compilador/linguagemsint.flex";
        File arquivo = new File(path);
        jflex.Main.generate(arquivo);
    }
}
