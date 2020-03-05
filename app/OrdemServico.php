<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdemServico extends Model
{
    
    public function ordem_servico_exame() {
        return $this->belongsToMany(\App\OrdemServicoExame::class);
    }

}
