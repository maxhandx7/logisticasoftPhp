unit Unit1;

{$mode objfpc}{$H+}

interface

uses
  SysUtils, Classes, httpdefs, fpHTTP, fpWeb, estaticos;

type

  { Tlogisticasoft }

  Tlogisticasoft = class(TFPWebModule)
    procedure indexRequest(Sender: TObject; ARequest: TRequest;
      AResponse: TResponse; var Handled: Boolean);
  private

  public

  end;

var
  logisticasoft: Tlogisticasoft;

implementation

{$R *.lfm}

{ Tlogisticasoft }

procedure Tlogisticasoft.indexRequest(Sender: TObject; ARequest: TRequest;
  AResponse: TResponse; var Handled: Boolean);
begin
  ARequest.ContentType:= 'text/html; charset=utf-8';

  with AResponse.contents do begin
       Add(Cabecera);
  end;

  Handled:= true;
end;

initialization
  RegisterHTTPModule('', Tlogisticasoft);
end.

