package compilador;

import static compilador.Token.*;

%%
%class Lexer
%type Token


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

"se"                         { lexeme = yytext(); return SE; }
"senao se"                       { lexeme = yytext(); return SENAOSE; }
"senao"                       { lexeme = yytext(); return SENAO; }
"inicio"                        {lexeme = yytext(); return INICIO;}
"("                           { lexeme = yytext(); return ABREPAR; }
")"                           { lexeme = yytext(); return FECHAPAR; }
";"                           { lexeme = yytext(); return FIMLINHA; }
"fim"                           { lexeme = yytext(); return FIM; }
"="                           { lexeme = yytext(); return ATRIB; }
"leia"                           { lexeme = yytext(); return LEIA; }
"escreva"                           { lexeme = yytext(); return ESCREVA; }
"enquanto"                           { lexeme = yytext(); return REPET; }
":"                           { lexeme = yytext(); return COMPREPET; }
"{"                           { lexeme = yytext(); return ABRECHAV; }
"}"                           { lexeme = yytext(); return FECHACHAV; }
"\n"                          {lexeme = yytext(); return PULA;}

{BRANCO}                     { /* Ignore */ }
{INTEIRO}                     { lexeme = yytext(); return INTEIRO; }
{OPERADOR}                    {lexeme = yytext(); return OPERADOR;}
{VARIAVEL}                      {lexeme = yytext(); return VARIAVEL;}
{COMPARACAO}                     {lexeme = yytext(); return COMPARACAO;}
{COMENTARIO}                   {lexeme = yytext(); return COMENTARIO;}
{STRING}                        {lexeme = yytext(); return STRING;}

. { return ERROR; }
