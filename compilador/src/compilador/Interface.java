package compilador;

import java.io.BufferedReader;
import java.io.StringReader;
import javax.swing.JTextArea;
import java.io.ByteArrayInputStream;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.nio.charset.StandardCharsets;


public class Interface extends javax.swing.JFrame {

    public JTextArea jtext;
    

    public void executar() throws Exception {
        int cont = 0;

        jtext = entrada;
        String expr = (String) jtext.getText();

        Lexer lexer = new Lexer(new StringReader(expr));

        String resultado = "";

        while (true) {
            Token token = lexer.yylex();
            if (token == null) {
                saida.setText(resultado);
                return;
            }

            switch (token) {
                case SE:
                    resultado = resultado + "Linha: " + cont + " --- Palavra reservada " + lexer.lexeme + "\n";
                    break;

                case SENAOSE:
                    resultado = resultado + "Linha: " + cont + " --- Palavra reservada " + lexer.lexeme + "\n";
                    break;

                case SENAO:
                    resultado = resultado + "Linha: " + cont + " --- Palavra reservada " + lexer.lexeme + "\n";
                    break;

                case ABREPAR:
                    resultado = resultado + "Linha: " + cont + " --- Palavra reservada " + lexer.lexeme + "\n";
                    break;

                case FECHAPAR:
                    resultado = resultado + "Linha: " + cont + " --- Palavra reservada " + lexer.lexeme + "\n";
                    break;

                case COMENTARIO:
                    resultado = resultado + "Linha: " + cont + " --- comentário -> " + lexer.lexeme + "\n";
                    break;

                case FIMLINHA:
                    resultado = resultado + "Linha: " + cont + " --- Palavra reservada " + lexer.lexeme + "\n";
                    break;
                    
                case STRING:
                    resultado = resultado + "Linha: " + cont + " --- String -> " + lexer.lexeme + "\n";
                    break;

                case INICIO:
                    resultado = resultado + "Linha: " + cont + " --- Palavra reservada " + lexer.lexeme + "\n";
                    break;

                case FIM:
                    resultado = resultado + "Linha: " + cont + " --- Palavra reservada " + lexer.lexeme + "\n";
                    break;

                case ATRIB:
                    resultado = resultado + "Linha: " + cont + " --- Palavra reservada " + lexer.lexeme + "\n";
                    break;

                case LEIA:
                    resultado = resultado + "Linha: " + cont + " --- Palavra reservada " + lexer.lexeme + "\n";
                    break;

                case ESCREVA:
                    resultado = resultado + "Linha: " + cont + " --- Palavra reservada " + lexer.lexeme + "\n";
                    break;

                case REPET:
                    resultado = resultado + "Linha: " + cont + " --- Palavra reservada " + lexer.lexeme + "\n";
                    break;

                case COMPREPET:
                    resultado = resultado + "Linha: " + cont + " --- Palavra reservada " + lexer.lexeme + "\n";
                    break;

                case ABRECHAV:
                    resultado = resultado + "Linha: " + cont + " --- Palavra reservada " + lexer.lexeme + "\n";
                    break;

                case FECHACHAV:
                    resultado = resultado + "Linha: " + cont + " --- Palavra reservada " + lexer.lexeme + "\n";
                    break;

                case INTEIRO:
                    resultado = resultado + "Linha: " + cont + " --- Inteiro -> " + lexer.lexeme + "\n";
                    break;

                case VARIAVEL:
                    resultado = resultado + "Linha: " + cont + " --- Variavel -> " + lexer.lexeme + "\n";
                    break;

                case OPERADOR:
                    resultado = resultado + "Linha: " + cont + " --- Operador -> " + lexer.lexeme + "\n";
                    break;
                    
                case COMPARACAO:
                    resultado = resultado + "Linha: " + cont + " --- Comparador -> " + lexer.lexeme + "\n";
                    break;

                case PULA:
                    cont++;
                    break;

                case ERROR:
                    resultado = resultado + "Erro na linha " + cont + ": Símbolo não reconhecido \n";
                    break;

                default:
                    resultado = resultado + "Linha: " + cont + "<" + lexer.lexeme + ">" + cont++;
                    break;
            }

        }
    }

    public Interface() {
        initComponents();
    }

    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jScrollPane2 = new javax.swing.JScrollPane();
        jTextArea2 = new javax.swing.JTextArea();
        jScrollPane1 = new javax.swing.JScrollPane();
        entrada = new javax.swing.JTextArea();
        jScrollPane3 = new javax.swing.JScrollPane();
        saida = new javax.swing.JTextArea();
        botaoanalisador = new javax.swing.JButton();
        limpatela = new javax.swing.JButton();
        jScrollPane4 = new javax.swing.JScrollPane();
        analiseSintatica = new javax.swing.JTextArea();
        jButton1 = new javax.swing.JButton();

        jTextArea2.setColumns(20);
        jTextArea2.setRows(5);
        jScrollPane2.setViewportView(jTextArea2);

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);

        entrada.setColumns(20);
        entrada.setRows(5);
        jScrollPane1.setViewportView(entrada);

        saida.setColumns(20);
        saida.setRows(5);
        jScrollPane3.setViewportView(saida);

        botaoanalisador.setText("Analise Léxica");
        botaoanalisador.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                botaoanalisadorActionPerformed(evt);
            }
        });

        limpatela.setText("Nova consulta");
        limpatela.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                limpatelaActionPerformed(evt);
            }
        });

        analiseSintatica.setColumns(20);
        analiseSintatica.setRows(5);
        jScrollPane4.setViewportView(analiseSintatica);

        jButton1.setText("Analise Sintática");
        jButton1.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton1ActionPerformed(evt);
            }
        });

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 399, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 53, Short.MAX_VALUE)
                .addComponent(jScrollPane3, javax.swing.GroupLayout.PREFERRED_SIZE, 363, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap())
            .addGroup(layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jScrollPane4)
                .addContainerGap())
            .addGroup(layout.createSequentialGroup()
                .addGap(158, 158, 158)
                .addComponent(limpatela)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addComponent(botaoanalisador)
                .addGap(137, 137, 137))
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addComponent(jButton1)
                .addGap(346, 346, 346))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(limpatela)
                    .addComponent(botaoanalisador))
                .addGap(18, 18, 18)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                    .addComponent(jScrollPane1, javax.swing.GroupLayout.DEFAULT_SIZE, 371, Short.MAX_VALUE)
                    .addComponent(jScrollPane3))
                .addGap(18, 18, 18)
                .addComponent(jButton1)
                .addGap(18, 18, 18)
                .addComponent(jScrollPane4, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(20, Short.MAX_VALUE))
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void botaoanalisadorActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_botaoanalisadorActionPerformed
        try {
            executar();
        } catch (Exception e) {
            e.printStackTrace();
        }
    }//GEN-LAST:event_botaoanalisadorActionPerformed

    
    private void limpatelaActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_limpatelaActionPerformed
        entrada.setText("");
        saida.setText("");
        analiseSintatica.setText("");
    }//GEN-LAST:event_limpatelaActionPerformed

    private void jButton1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton1ActionPerformed
        // TODO add your handling code here:
         
        JTextArea jt = entrada;
        String expr = (String) jt.getText();
                 
        InputStream stream = new ByteArrayInputStream(expr.getBytes(StandardCharsets.UTF_8));

            
            parser p = new parser(new compilador.Yylex(new InputStreamReader(stream)));
        try{
            p.parse();
            
            
//            if(p.error_sym() == 1){
                analiseSintatica.setText("Não encontrou erro sintático");
//            }
            
            
        } catch (Exception e){
            analiseSintatica.setText(p.getScanner().toString());
        }
    }//GEN-LAST:event_jButton1ActionPerformed

    public static void main(String args[]) {

        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(Interface.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(Interface.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(Interface.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(Interface.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }

        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new Interface().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JTextArea analiseSintatica;
    private javax.swing.JButton botaoanalisador;
    private javax.swing.JTextArea entrada;
    private javax.swing.JButton jButton1;
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JScrollPane jScrollPane2;
    private javax.swing.JScrollPane jScrollPane3;
    private javax.swing.JScrollPane jScrollPane4;
    private javax.swing.JTextArea jTextArea2;
    private javax.swing.JButton limpatela;
    private javax.swing.JTextArea saida;
    // End of variables declaration//GEN-END:variables

}
