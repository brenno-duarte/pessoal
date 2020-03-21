<?php

class Formatar {
    public static function formatarContato($numero){
        $va1 = $numero;
        $va2 = explode("(", $va1);
        $va3 = explode(")", $va2[1]);
        $va4 = explode("-", $va3[1]);

        $ddd = $va3[0];
        $num = $va4[0].$va4[1];
        $contato = $ddd.$num;
        $formatado = str_replace(" ", "", $contato);

        return $formatado;
    }
}