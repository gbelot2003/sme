<?php
namespace Acme\Helpers;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FormatQueryDates
{
    private $inicio;
    private $final;

    function __construct($inicio, $final)
    {
        $this->inicio = $inicio;
        $this->final = $final;
    }

   /* /**
     * @return string
     */
    /**private function transformToReadableDate($date)
    {
        $porciones = explode("-", $date);
        $redate = ($porciones[2] . "-" . $porciones[1] . "-" . $porciones[0]);
        return $redate;
    }*/

    /**
     * @return array
     */
    public function formatQueryDates()
    {
        /*$preini = $this->transformToReadableDate($this->inicio);
        $preini = $this->transformToReadableDate($this->final);*/

        $bdate = Carbon::createFromFormat('Y-m-d', $this->inicio)->startOfDay();
        $edate = Carbon::createFromFormat('Y-m-d', $this->final)->endOfDay();
        return array($bdate, $edate);
    }
}