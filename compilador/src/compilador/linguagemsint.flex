package compilador;

import static compilador.Token.*;
import java_cup.runtime.Symbol;
import compilador.sym;



%%

//%public
%type java_cup.runtime.Symbol
%cup
%full
%line
%column
%char
%eofval{
    return new Symbol (sym.EOF, new String("Fim do arquivo"));
%eofval}

%{
    @Override
    public String toString(){
        return "Erro Sintatico encontrado na linha "+yyline + " e na coluna " + yycolumn;
    }

%}

BRANCO = [\n| |\t|\r]
INTEIRO = 0|[1-9][0-9]*
COMPARACAO = "!="|">"|"<"|"=="|"<="|">="
VARIAVEL = [#][a-zA-Z][a-zA-Z0-9]*
OPERADOR = [+]|[-]|[/]|[*]|[%]
COMENTARIO = [$][a-zA-Z0-9| ]*
STRING = ['][a-zA-Z| ]*[']

%{
public String lexeme;
%}
%%

{BRANCO} {/*Ignore*/}

"se"                            {return new Symbol(sym.SE, yychar, yyline, yytext());}
"senao se"                       { return new Symbol(sym.SENAOSE, yychar, yyline, yytext()); }
"senao"                       { return new Symbol(sym.SENAO, yychar, yyline, yytext()); }
"inicio"                        {return new Symbol(sym.INICIO, yychar, yyline, yytext());}
"("                           { return new Symbol(sym.ABREPAR, yychar, yyline, yytext()); }
")"                           { return new Symbol(sym.FECHAPAR, yychar, yyline, yytext()); }
";"                           { return new Symbol(sym.FIMLINHA, yychar, yyline, yytext()); }
"fim"                           { return new Symbol(sym.FIM, yychar, yyline, yytext()); }
"="                           { return new Symbol(sym.ATRIB, yychar, yyline, yytext()); }
"leia"                           { return new Symbol(sym.LEIA, yychar, yyline, yytext()); }
"escreva"                           { return new Symbol(sym.ESCREVA, yychar, yyline, yytext()); }
"enquanto"                           { return new Symbol(sym.REPET, yychar, yyline, yytext()); }
":"                           { return new Symbol(sym.COMPREPET, yychar, yyline, yytext()); }
"{"                           { return new Symbol(sym.ABRECHAV, yychar, yyline, yytext()); }
"}"                           { return new Symbol(sym.FECHACHAV, yychar, yyline, yytext()); }
"\n"                          {return new Symbol(sym.PULA, yychar, yyline, yytext());}

{BRANCO}                     { /* Ignore */ }
{INTEIRO}                     { return new Symbol(sym.INTEIRO, yychar, yyline, yytext()); }
{OPERADOR}                    {return new Symbol(sym.OPERADOR, yychar, yyline, yytext());}
{VARIAVEL}                      {return new Symbol(sym.VARIAVEL, yychar, yyline, yytext());}
{COMPARACAO}                     {return new Symbol(sym.COMPARACAO, yychar, yyline, yytext());}
{COMENTARIO}                   {return new Symbol(sym.COMENTARIO, yychar, yyline, yytext());}
{STRING}                        {return new Symbol(sym.STRING, yychar, yyline, yytext());}

 . {return new Symbol (sym.ERROR, yychar, yyline, yytext());} 
