<?php

function printMessage($message) {
    if ($message=='success-create')
        return '<span class="text-success">Registro efetuado com sucesso!</span>';
    if ($message=='error-create')
        return '<span class="text-error">Erro durante o registro.</span>';

    if ($message=='success-remove')
        return '<span class="text-success">Registro removido com sucesso!</span>';
    if ($message=='error-remove')
        return '<span class="text-error">Erro removendo o registro.</span>';

    if ($message=='success-update')
        return '<span class="text-success">Registro atualizado com sucesso!</span>';
    if ($message=='error-update')
        return '<span class="text-error">Erro atualizando o registro.</span>';

    if ($message=='success-devolucao')
        return '<span class="text-success">Devolução efetuada com sucesso!</span>';
    if ($message=='error-devolucao')
        return '<span class="text-error">Erro na devolução.</span>';
}
