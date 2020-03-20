<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 24/8/17
 * Time: 16:57
 */

namespace App\Repositories;

use App\Entities\Propiedad;
use Illuminate\Support\Facades\DB;

class PropiedadRepository
{
    public function getPropiedadAll($idlocal_comercial)
    {
        return DB::table('publicacion')
            ->select('propiedad.prop_direccion as prop_direccion', 'localidad.loc_nombre as loc_nombre','publicacion.pub_id as pub_id',
                'tipo_operacion.tipopera_nombre as tipopera_nombre','tipo_inmueble.tipoinmu_nombre as tipoinmu_nombre',
                'propiedad.prop_valor as prop_valor','propiedad.prop_comision as prop_comision',
                'estado.est_id as est_id','estado.est_nombre as est_nombre',
                'tipo_aviso.aviso_id as aviso_id','tipo_aviso.aviso_nombre as aviso_nombre','propiedad.prop_id as prop_id',
                DB::raw("(SELECT imagen.img_url as img_url
                 FROM imagen WHERE imagen.prop_id=propiedad.prop_id order by imagen.img_id desc LIMIT 1) as img"))
            ->Join('propiedad','propiedad.prop_id','=','publicacion.prop_id')
            ->Join('localidad','localidad.loc_id','=','propiedad.loc_id')
            ->Join('propietario','propietario.propietario_id','=','propiedad.propietario_id')
            ->Join('persona','propietario.per_id','=','persona.per_id')
            ->Join('tipo_operacion','tipo_operacion.tipopera_id','=','propiedad.tipopera_id')
            ->Join('tipo_inmueble','tipo_inmueble.tipoinmu_id','=','propiedad.tipoinmu_id')
            ->Join('estado','estado.est_id','=','publicacion.est_id')
            ->Join('tipo_aviso','tipo_aviso.aviso_id','=','publicacion.aviso_id')
            ->Join('local_comercial','local_comercial.comer_id','=','publicacion.comer_id')
            // -- est_id 16 significa estado eliminado -- //
            ->where('publicacion.est_id','!=','16')
            ->where('local_comercial.comer_id','=',$idlocal_comercial)
            ->orderBy('publicacion.pub_id','desc')
            ->get();
    }

    public function getPropiedadId($idpropietario,$idlocal_comercial)
    {
        return DB::table('publicacion')
            ->select('propiedad.prop_direccion as prop_direccion', 'localidad.loc_nombre as loc_nombre','publicacion.pub_id as pub_id',
                'tipo_operacion.tipopera_nombre as tipopera_nombre','tipo_inmueble.tipoinmu_nombre as tipoinmu_nombre',
                'propiedad.prop_valor as prop_valor','propiedad.prop_comision as prop_comision',
                'estado.est_id as est_id','estado.est_nombre as est_nombre',
                'tipo_aviso.aviso_id as aviso_id','tipo_aviso.aviso_nombre as aviso_nombre','propiedad.prop_id as prop_id',
                DB::raw("(SELECT imagen.img_url as img_url
                 FROM imagen WHERE imagen.prop_id=propiedad.prop_id order by imagen.img_id desc LIMIT 1) as img"))
            ->Join('propiedad','propiedad.prop_id','=','publicacion.prop_id')
            ->Join('localidad','localidad.loc_id','=','propiedad.loc_id')
            ->Join('propietario','propietario.propietario_id','=','propiedad.propietario_id')
            ->Join('persona','propietario.per_id','=','persona.per_id')
            ->Join('tipo_operacion','tipo_operacion.tipopera_id','=','propiedad.tipopera_id')
            ->Join('tipo_inmueble','tipo_inmueble.tipoinmu_id','=','propiedad.tipoinmu_id')
            ->Join('estado','estado.est_id','=','publicacion.est_id')
            ->Join('tipo_aviso','tipo_aviso.aviso_id','=','publicacion.aviso_id')
            ->Join('local_comercial','local_comercial.comer_id','=','publicacion.comer_id')
            // -- est_id 16 significa estado eliminado -- //i
            ->where('publicacion.est_id','!=','16')
            ->where('propietario.propietario_id','=',$idpropietario)
            ->where('local_comercial.comer_id','=',$idlocal_comercial)
            ->orderBy('publicacion.pub_id','desc')
            ->get();
    }

    public function getPropiedadClienteId($idlocal_comercial)
    {
        return DB::table('publicacion')
            ->select('propiedad.prop_direccion as prop_direccion', 'localidad.loc_nombre as loc_nombre','publicacion.pub_id as pub_id',
                'tipo_operacion.tipopera_nombre as tipopera_nombre','tipo_inmueble.tipoinmu_nombre as tipoinmu_nombre',
                'propiedad.prop_valor as prop_valor','propiedad.prop_comision as prop_comision',
                'estado.est_id as est_id','estado.est_nombre as est_nombre',
                'tipo_aviso.aviso_id as aviso_id','tipo_aviso.aviso_nombre as aviso_nombre','propiedad.prop_id as prop_id',
                DB::raw("(SELECT imagen.img_url as img_url
                 FROM imagen WHERE imagen.prop_id=propiedad.prop_id order by imagen.img_id desc LIMIT 1) as img"))
            ->Join('propiedad','propiedad.prop_id','=','publicacion.prop_id')
            ->Join('localidad','localidad.loc_id','=','propiedad.loc_id')
            ->Join('propietario','propietario.propietario_id','=','propiedad.propietario_id')
            ->Join('persona','propietario.per_id','=','persona.per_id')
            ->Join('tipo_operacion','tipo_operacion.tipopera_id','=','propiedad.tipopera_id')
            ->Join('tipo_inmueble','tipo_inmueble.tipoinmu_id','=','propiedad.tipoinmu_id')
            ->Join('estado','estado.est_id','=','publicacion.est_id')
            ->Join('tipo_aviso','tipo_aviso.aviso_id','=','publicacion.aviso_id')

            ->Join('local_comercial','local_comercial.comer_id','=','publicacion.comer_id')
            ->Join('propietario_local_comercial','propietario_local_comercial.propcomer_id','=','local_comercial.propcomer_id')
            ->Join('persona as per_prop','per_prop.per_id','=','propietario_local_comercial.per_id')

            // -- est_id 16 significa estado eliminado -- //
            ->where('publicacion.est_id','!=','16')
            //->where('propietario.propietario_id','=',$idpropietario)
            ->where('local_comercial.comer_id','=',$idlocal_comercial)
            ->orderBy('publicacion.pub_id','desc')
            ->get();

    }

    public function getPropiedadIdPdf($idpublicacion,$idlocal_comercial)
    {
        return DB::table('publicacion')
/*            ->select('propiedad.prop_direccion as prop_direccion', 'localidad.loc_nombre as loc_nombre','publicacion.pub_id as pub_id',
                'tipo_operacion.tipopera_nombre as tipopera_nombre','tipo_inmueble.tipoinmu_nombre as tipoinmu_nombre',
                'propiedad.prop_valor as prop_valor','propiedad.prop_comision as prop_comision',
                'estado.est_id as est_id','estado.est_nombre as est_nombre',
                'tipo_aviso.aviso_id as aviso_id','tipo_aviso.aviso_nombre as aviso_nombre')*/
            ->Join('propiedad','propiedad.prop_id','=','publicacion.prop_id')
            ->LeftJoin('antiguedad','propiedad.antig_id','=','antiguedad.antig_id')
            ->LeftJoin('num_habitacion','propiedad.hab_id','=','num_habitacion.hab_id')
            ->LeftJoin('num_cochera','propiedad.cochera_id','=','num_cochera.cochera_id')
            ->LeftJoin('num_banio','propiedad.ban_id','=','num_banio.ban_id')
            ->LeftJoin('num_ambiente','propiedad.numamb_id','=','num_ambiente.numamb_id')
            ->Join('localidad','localidad.loc_id','=','propiedad.loc_id')
            ->Join('propietario','propietario.propietario_id','=','propiedad.propietario_id')
            ->Join('persona','propietario.per_id','=','persona.per_id')
            ->Join('tipo_operacion','tipo_operacion.tipopera_id','=','propiedad.tipopera_id')
            ->Join('tipo_inmueble','tipo_inmueble.tipoinmu_id','=','propiedad.tipoinmu_id')
            ->Join('estado','estado.est_id','=','publicacion.est_id')
            ->Join('tipo_aviso','tipo_aviso.aviso_id','=','publicacion.aviso_id')
            ->Join('local_comercial','local_comercial.comer_id','=','publicacion.comer_id')
            // -- est_id 16 significa estado eliminado -- //
            ->where('publicacion.est_id','!=','16')
            ->where('publicacion.pub_id','=',$idpublicacion)
            ->where('local_comercial.comer_id','=',$idlocal_comercial)
            ->orderBy('publicacion.pub_id','desc')
            ->first();
    }

    public function getInfoPropietario($idpropietario)
    {
        return DB::table('propietario')
            ->Join('persona','propietario.per_id','=','persona.per_id')
            ->where('propietario.propietario_id','=',$idpropietario)
            ->first();
    }

    public function getInfoPropietarioCliente($idpropietario)
    {
        return DB::table('local_comercial')
            ->where('local_comercial.comer_id','=',$idpropietario)
            ->first();
    }

    public function getMaxNroPropiedad(){
        $max = DB::table('propiedad')
            ->select(DB::raw('MAX(prop_id) as maximo'))
            ->first();

        if ($max == null) {
            return $max = 1;
        } else {
            return $sig = $max->maximo + 1;
        }
    }

    public function getPropiedadExportacion($idpublicacion)
    {
        return DB::table('publicacion')
            ->select('publicacion.pub_id as ID','propiedad.prop_direccion as Dirección', 'localidad.loc_nombre as Localidad',
                'tipo_operacion.tipopera_nombre as Tipo Operación','tipo_inmueble.tipoinmu_nombre as Tipo Inmueble',
                'propiedad.prop_valor as Valor Propiedad','propiedad.prop_comision as Comisión','estado.est_nombre as Estado',
                'tipo_aviso.aviso_nombre as Aviso')
            ->Join('propiedad','propiedad.prop_id','=','publicacion.prop_id')
            ->Join('localidad','localidad.loc_id','=','propiedad.loc_id')
            ->Join('propietario','propietario.propietario_id','=','propiedad.propietario_id')
            ->Join('persona','propietario.per_id','=','persona.per_id')
            ->Join('tipo_operacion','tipo_operacion.tipopera_id','=','propiedad.tipopera_id')
            ->Join('tipo_inmueble','tipo_inmueble.tipoinmu_id','=','propiedad.tipoinmu_id')
            ->Join('estado','estado.est_id','=','publicacion.est_id')
            ->Join('tipo_aviso','tipo_aviso.aviso_id','=','publicacion.aviso_id')
            ->Join('local_comercial','local_comercial.comer_id','=','publicacion.comer_id')
            // -- est_id 16 significa estado eliminado -- //
            ->where('publicacion.est_id','!=','16')
            ->where('publicacion.pub_id', '=', $idpublicacion)
            ->orderBy('publicacion.pub_id','desc')
            ->get();
    }

    public function getServicioIdPublicacion($idpropiedad)
    {
        return DB::table('propxserv')
            ->Join('servicio','propxserv.serv_id','=','servicio.serv_id')
            ->where('prop_id','=',$idpropiedad)->orderby('pxs_id')->get();
    }

    public function getAmbienteIdPublicacion($idpropiedad)
    {
        return DB::table('propxamb')
            ->Join('ambiente','propxamb.amb_id','=','ambiente.amb_id')
            ->where('prop_id','=',$idpropiedad)->orderby('pxa_id')->get();
    }

    public function getInstalacionIdPublicacion($idpropiedad)
    {
        return DB::table('propxinst')
            ->Join('instalacion','propxinst.inst_id','=','instalacion.inst_id')
            ->where('prop_id','=',$idpropiedad)->orderby('pxi_id')->get();
    }

}