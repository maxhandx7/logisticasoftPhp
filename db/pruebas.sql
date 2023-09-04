      SQL_GET_ALL_INSALDO_RECURSO  = 'SELECT S.CONUMERO, S.WHSLOC, S.RECURSO, S.RECURSO_SEQ, S.LOTE, S.CLFCOD, S.SALDO, S.QTYRES, S.QTYDIS, S.QTYDIS, S.CLFCOD, R.DRECURSO' +
              ', S.WHSCOD, S.CLIENTE, S.LOTE2, S.LOTE3, S.LOTE4, L.FECPRD, L.FECVEN, S.IDINSALDO, S.CONUMERO, R.UNDMED, R.UNDMEDC, R.UNDMEDFCT' +
              ' FROM INSALDO S ' +
              'LEFT OUTER JOIN RESMST R ON R.RECURSO = S.RECURSO ' +
              'LEFT OUTER JOIN INLOTES L ON L.RECURSO=S.RECURSO AND L.LOTE=S.LOTE ' +
              'WHERE S.RECURSO = ''%s'' AND S.CONO = ''%s'' AND S.WHSCOD = ''%s'' ' +
              'ORDER BY CLIENTE, WHSCOD, WHSLOC ';

      SQL_GET_ALL_INSALDO_WHSLOC  = 'SELECT S.CONUMERO, S.WHSLOC, S.RECURSO, S.RECURSO_SEQ, S.LOTE, S.CLFCOD, S.SALDO, S.QTYRES, S.QTYDIS, S.QTYDIS, S.CLFCOD, R.DRECURSO' +
              ', S.WHSCOD, S.CLIENTE, S.LOTE2, S.LOTE3, S.LOTE4, L.FECPRD, L.FECVEN, S.IDINSALDO, S.CONUMERO, R.UNDMED, R.UNDMEDC, R.UNDMEDFCT, ' +
              '(SELECT FIRST 1 CODEBAR FROM RESMSTEAN WHERE RECURSO = S.RECURSO AND CLIENTE = S.CLIENTE) AS CODEBAR ' +
              ' FROM INSALDO S ' +
              'LEFT OUTER JOIN RESMST R ON R.RECURSO = S.RECURSO ' +
              'LEFT OUTER JOIN INLOTES L ON L.RECURSO=S.RECURSO AND L.LOTE=S.LOTE ' +
              'WHERE S.WHSLOC = ''%s'' AND S.CONO = ''%s'' AND S.WHSCOD = ''%s''  ' +
              'ORDER BY CLIENTE, RECURSO, LOTE ';
      SQL_GET_ALL_INSALDO_CODEBAR  = 'SELECT S.CONUMERO, S.WHSLOC, S.RECURSO, S.RECURSO_SEQ, S.LOTE, S.CLFCOD, S.SALDO, S.QTYRES, S.QTYDIS, S.QTYDIS, S.CLFCOD, R.DRECURSO' +
              ', S.WHSCOD, S.CLIENTE, S.LOTE2, S.LOTE3, S.LOTE4, L.FECPRD, L.FECVEN, S.IDINSALDO, S.CONUMERO, R.UNDMED, R.UNDMEDC, R.UNDMEDFCT, E.CODEBAR '  +
              ' FROM INSALDO S ' +
              'INNER JOIN RESMST R ON R.RECURSO = S.RECURSO ' +
              'LEFT OUTER JOIN RESMSTEAN E ON E.RECURSO = S.RECURSO AND E.CLIENTE = S.CLIENTE ' +
              'LEFT OUTER JOIN INLOTES L ON L.RECURSO=S.RECURSO AND L.LOTE=S.LOTE ' +
              'WHERE E.CODEBAR = ''%s'' AND S.CONO = ''%s'' AND S.WHSCOD = ''%s'' ' ;



-- obtener el siguiente numero de secuencia o documento
          --    SELECT  gen_ID(seqmst_GEN, 1) SEQNRO FROM RDB$DATABASE 
 -- tabla de transacciones EL TIPO T = cambio de ubicacion , existen basicas y ampliadas
  select * from intramst where tipomov = 'T'