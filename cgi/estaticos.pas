unit estaticos;

{$mode ObjFPC}{$H+}

interface

uses
  Classes, SysUtils;

function Cabecera: String;
function Menu(Usuario: String): String;
function Pie: String;

implementation

function Cabecera: String;
begin
  Result := '<!DOCTYPE html>'+
  '<html lang="es">'+
  '<head>'+
    '<meta charset="UTF-8">'+
    '<meta name="viewport" content="width=device-width, initial-scale=1.0">'+
    '<title>Login</title>'                                                  +
    '<link rel="stylesheet" type="text/css" href="style.css">'              +
    '<link rel="shortcut icon" href="lol.png" type="image/x-icon">'         +
    '</head>'  ;

end;

end.

