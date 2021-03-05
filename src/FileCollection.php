<?php

$obj = new FileCollection();
echo $obj->write();
echo $obj->read();

class FileCollection{

    public function write(){
        $arquivo = fopen('arquivoteste.txt','w');
       
        if ($arquivo == false) die('Não foi possível criar o arquivo.');
       
        $texto = 'Olá Mundo !!';
        fwrite($arquivo, $texto);
       
        fclose($arquivo);
    }

    public function read(){
        // Abre o Arquvio no Modo r (para leitura)
        $arquivo = fopen ('arquivoteste.txt', 'r');

        while(!feof($arquivo))
        {
            $linha = fgets($arquivo, 8192);
            echo $linha.'<br />';
        }
        
        fclose($arquivo);
    }
}

