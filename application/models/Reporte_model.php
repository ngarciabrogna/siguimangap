
<?php

class Reporte_model extends CI_Model
{
    
    public function years()
    {
        $this->db->select('YEAR(fecha) as year');
        $this->db->from('reservas');
        $this->db->group_by("year");
        $this->db->order_by("year","desc");
        $this->db->where('estado', 0);
        $this->db->where('cancelada', 0);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function meses()
    {
        $this->db->select('month(fecha) as mes');
        $this->db->from('reservas');
        $this->db->group_by("mes");
        $this->db->order_by("mes","desc");
        $this->db->where('estado', 0);
        $this->db->where('cancelada', 0);
        $query = $this->db->get();
        return $query->result();
    }


    public function reservasCompletadas()
    {
        $this->db->select('r.id, r.fecha, e.nombre empresa,p.nombre paquete,r.cantidad_pasajeros cantidad');
        $this->db->from('reservas r');
        $this->db->join('empresas e' ,'r.id_empresa=e.id');
        $this->db->join('paquetes p' ,'r.id_paquete=p.id');
        $this->db->where('r.estado', 0);
        $this->db->where('r.cancelada', 0);
        $query = $this->db->get();
        return $query->result();
    }
    public function reservasCompletadasFecha($inicio,$fin)
    {
        $this->db->select('r.id, r.fecha, e.nombre empresa,p.nombre paquete,r.cantidad_pasajeros cantidad');
        $this->db->from('reservas r');
        $this->db->join('empresas e' ,'r.id_empresa=e.id');
        $this->db->join('paquetes p' ,'r.id_paquete=p.id');
        $this->db->where('r.fecha>=', $inicio);
        $this->db->where('r.fecha<=', $fin);
        $this->db->where('r.estado', 0);
        $this->db->where('r.cancelada', 0);
        $query = $this->db->get();
        return $query->result();
    }
    public function reservasCanceladasTabla()
    {
        $this->db->select('r.id, r.fecha, e.nombre empresa,p.nombre paquete,r.cantidad_pasajeros cantidad');
        $this->db->from('reservas r');
        $this->db->join('empresas e' ,'r.id_empresa=e.id');
        $this->db->join('paquetes p' ,'r.id_paquete=p.id');
        $this->db->where('r.cancelada', 1);
        $query = $this->db->get();
        return $query->result();
    }
    public function reservasCanceladasTablaFecha($inicio,$fin)
    {
        $this->db->select('r.id, r.fecha, e.nombre empresa,p.nombre paquete,r.cantidad_pasajeros cantidad');
        $this->db->from('reservas r');
        $this->db->join('empresas e' ,'r.id_empresa=e.id');
        $this->db->join('paquetes p' ,'r.id_paquete=p.id');
        $this->db->where('r.fecha>=', $inicio);
        $this->db->where('r.fecha<=', $fin);
        $this->db->where('r.cancelada', 1);
        $query = $this->db->get();
        return $query->result();
    }
    public function pasajerosTabla()
    {
        $this->db->select('g.id,g.total_personas,g.hora_salida,g.fecha,e.nombre empresa,c.nombre coordinador');
        $this->db->from('grupos g');
        $this->db->join('empresas e' ,'g.id_empresa=e.id');
        $this->db->join('coordinadores c' ,'g.id_coordinador=c.id');
        $this->db->where('g.estado', 1);
        $this->db->where('g.activo', 0);

       
        $query = $this->db->get();
        return $query->result();
    }
    public function pasajerosTablaFecha($inicio,$fin)
    {
        $this->db->select('g.id,g.total_personas,g.hora_salida,g.fecha,e.nombre empresa,c.nombre coordinador');
        $this->db->from('grupos g');
        $this->db->join('empresas e' ,'g.id_empresa=e.id');
        $this->db->join('coordinadores c' ,'g.id_coordinador=c.id');
        $this->db->where('g.fecha>=', $inicio);
        $this->db->where('g.fecha<=', $fin);
        $this->db->where('g.estado', 1);
        $this->db->where('g.activo', 0);

       
        $query = $this->db->get();
        return $query->result();
    }
    public function empresasTabla()
    {
        $this->db->select('DISTINCT(e.nombre) as empresa, COUNT(g.id) as grupo, sum(g.total_personas) personas');
        $this->db->from('grupos g');
        $this->db->join('empresas e' ,'g.id_empresa=e.id');
        $this->db->where('g.estado', 1);
        $this->db->where('g.activo', 0);
        $this->db->group_by("empresa");
        $this->db->order_by("empresa");
        $query = $this->db->get();
        return $query->result();
    }
    public function empresasTablaFecha($inicio,$fin)
    {
        $this->db->select('DISTINCT(e.nombre) as empresa, COUNT(g.id) as grupo, sum(g.total_personas) personas');
        $this->db->from('grupos g');
        $this->db->join('empresas e' ,'g.id_empresa=e.id');
        $this->db->where('g.fecha>=', $inicio);
        $this->db->where('g.fecha<=', $fin);
        $this->db->where('g.estado', 1);
        $this->db->where('g.activo', 0);
        $this->db->group_by("empresa");
        $this->db->order_by("empresa");
        $query = $this->db->get();
        return $query->result();
    }
    public function mesesCanceladas()
    {
        $this->db->select('month(fecha) as mes');
        $this->db->from('reservas');
        $this->db->group_by("mes");
        $this->db->order_by("mes","desc");
        $this->db->where('cancelada', 1);
        $query = $this->db->get();
        return $query->result();
    }
       
    public function cantidades($year1)
    {
        $this->db->select('MONTH(fecha) as mes, COUNT(id) as cantidad');
        $this->db->from('reservas');
        $this->db->where('fecha >=', $year1.'-01-01');
        $this->db->where('fecha <=', $year1.'-12-31');
        $this->db->where('estado', 0);
        $this->db->where('cancelada', 0);
        $this->db->group_by("mes");
        $this->db->order_by("mes");
       
        $query = $this->db->get();
        return $query->result();
    }
    public function cantidadesAnio()
    {
        $this->db->select('YEAR(fecha) as anio, COUNT(id) as cantidadAnio');
        $this->db->from('reservas');
        $this->db->where('estado', 0);
        $this->db->where('cancelada', 0);
        $this->db->group_by("anio");
        $this->db->order_by("anio");
       
        $query = $this->db->get();
        return $query->result();
    }
    public function cantidadesDias($yy,$mm)
    {
        $this->db->select('day(fecha) as dia, COUNT(id) as ccc');
        $this->db->from('reservas');
        $this->db->where('fecha >=', $yy.'-'.$mm.'-01');
        $this->db->where('fecha <=', $yy.'-'.$mm.'-31'); 
        $this->db->where('estado', 0);
        $this->db->where('cancelada', 0);
        $this->db->group_by("dia");
        $this->db->order_by("dia");
       
        $query = $this->db->get();
        return $query->result();
    }
    public function reservasCanceladas($yCancelada)
    {
        $this->db->select('MONTH(fecha) as mes, COUNT(id) as canceladaa');
        $this->db->from('reservas');
        $this->db->where('fecha >=', $yCancelada.'-01-01');
        $this->db->where('fecha <=', $yCancelada.'-12-31');
        $this->db->where('cancelada', 1);
        $this->db->group_by("mes");
        $this->db->order_by("mes");
       
        $query = $this->db->get();
        return $query->result();
    }
    public function reservasCanceladasDia($yCc,$mCc)
    {
        $this->db->select('day(fecha) as dia, COUNT(id) as diaCancel');
        $this->db->from('reservas');
        $this->db->where('fecha >=', $yCc.'-'.$mCc.'-01');
        $this->db->where('fecha <=', $yCc.'-'.$mCc.'-31'); 
        $this->db->where('cancelada', 1);
        $this->db->group_by("dia");
        $this->db->order_by("dia");
        
        $query = $this->db->get();
        return $query->result();
    }
    public function reservasCanceladasAnio()
    {
        $this->db->select('YEAR(fecha) as anio, COUNT(id) as canceladaAnio');
        $this->db->from('reservas');
        $this->db->where('cancelada', 1);
        $this->db->group_by("anio");
        $this->db->order_by("anio");
       
        $query = $this->db->get();
        return $query->result();
    }
    public function yearsCanceladas()
    {
        $this->db->select('YEAR(fecha) as year');
        $this->db->from('reservas');
        $this->db->group_by("year");
        $this->db->order_by("year","desc");
        $this->db->where('cancelada', 1);
        $query = $this->db->get();
        return $query->result();
    }
    public function yearsPasajeros()
    {
        $this->db->select('YEAR(fecha) as year');
        $this->db->from('grupos');
        $this->db->group_by("year");
        $this->db->order_by("year","desc");
        $this->db->where('estado', 1);
        $this->db->where('activo', 0);
        $query = $this->db->get();
        return $query->result();
    }

    public function mesesPasajeros()
    {
        $this->db->select('month(fecha) as mes');
        $this->db->from('grupos');
        $this->db->group_by("mes");
        $this->db->order_by("mes","desc");
        $this->db->where('estado', 1);
        $this->db->where('activo', 0);
        $query = $this->db->get();
        return $query->result();
    }
       

    public function cantidadesPasajeros($yearPasajero)
    {
        $this->db->select('MONTH(fecha) as mesP, sum(total_personas) as cantidadP');
        $this->db->from('grupos');
        $this->db->where('fecha >=', $yearPasajero.'-01-01');
        $this->db->where('fecha <=', $yearPasajero.'-12-31');
        $this->db->where('estado', 1);
        $this->db->where('activo', 0);
        $this->db->group_by("mesP");
        $this->db->order_by("mesP");
       
        $query = $this->db->get();
        return $query->result();
    }

    public function cantidadesPasajerosDias($yPasajero,$mPasajero)
    {
        $this->db->select('day(fecha) as dia, sum(total_personas) as pass');
        $this->db->from('grupos');
        $this->db->where('fecha >=', $yPasajero.'-'.$mPasajero.'-01');
        $this->db->where('fecha <=', $yPasajero.'-'.$mPasajero.'-31'); 
        $this->db->where('estado', 1);
        $this->db->where('activo', 0);
        $this->db->group_by("dia");
        $this->db->order_by("dia");
       
        $query = $this->db->get();
        return $query->result();
    }
    public function cantidadesPasajerosAnio()
    {
        $this->db->select('YEAR(fecha) as anio, sum(total_personas) as cantidadP');
        $this->db->from('grupos');
        $this->db->where('estado', 1);
        $this->db->where('activo', 0);
        $this->db->group_by("anio");
        $this->db->order_by("anio");
       
        $query = $this->db->get();
        return $query->result();
    }
    public function empresasGrupos($y) //cantidad de pasajeros por empresa
    {
        $this->db->select('DISTINCT(e.nombre) as empresa, sum(g.total_personas) as grupo');
        $this->db->from('grupos g');
        $this->db->join('empresas e' ,'g.id_empresa=e.id');
        $this->db->where('g.fecha >=', $y.'-01-01');
        $this->db->where('g.fecha <=', $y.'-12-31');
        $this->db->where('g.estado', 1);
        $this->db->where('g.activo', 0);
        $this->db->group_by("empresa");
        $this->db->order_by("grupo desc");
        $query = $this->db->get();
        return $query->result();
    }
    public function empresasGruposReporte($y)
    {
        $this->db->select('DISTINCT(e.nombre) as empresa, count(g.id) as grupo');
        $this->db->from('grupos g');
        $this->db->join('empresas e' ,'g.id_empresa=e.id');
        $this->db->where('g.fecha >=', $y.'-01-01');
        $this->db->where('g.fecha <=', $y.'-12-31');
        $this->db->where('g.estado', 1);
        $this->db->where('g.activo', 0);
        $this->db->group_by("empresa");
        $this->db->order_by("grupo DESC");
        $query = $this->db->get();
        return $query->result();
    }
    public function empresasReservasConcretas($y)
    {
        $this->db->select('DISTINCT(e.nombre) as empresa, count(r.id) as reserva');
        $this->db->from('reservas r');
        $this->db->join('empresas e' ,'r.id_empresa=e.id');
        $this->db->where('r.fecha >=', $y.'-01-01');
        $this->db->where('r.fecha <=', $y.'-12-31');
        $this->db->where('r.estado', 0);
        $this->db->where('r.cancelada', 0);
        $this->db->group_by("empresa");
        $this->db->order_by("reserva desc");
        $query = $this->db->get();
        return $query->result();
    }

    public function empresasReservasConcretasTablaFecha($inicio,$fin)
    {
        $this->db->select('DISTINCT(e.nombre) as empresa, count(r.id) as reserva, sum(r.cantidad_pasajeros) total');
        $this->db->from('reservas r');
        $this->db->join('empresas e' ,'r.id_empresa=e.id');
        $this->db->where('r.estado', 0);
        $this->db->where('r.cancelada', 0);
        $this->db->where('r.fecha>=', $inicio);
        $this->db->where('r.fecha<=', $fin);
        $this->db->group_by("empresa");
        $this->db->order_by("empresa");
        $query = $this->db->get();
        return $query->result();
    }
    public function empresasReservasConcretasTabla()
    {
        $this->db->select('DISTINCT(e.nombre) as empresa, count(r.id) as reserva, sum(r.cantidad_pasajeros) total');
        $this->db->from('reservas r');
        $this->db->join('empresas e' ,'r.id_empresa=e.id');
        $this->db->where('r.estado', 0);
        $this->db->where('r.cancelada', 0);
        $this->db->group_by("empresa");
        $this->db->order_by("empresa");
        $query = $this->db->get();
        return $query->result();
    }


    public function empresasReservasCanceladasTablaFecha($inicio,$fin)
    {
        $this->db->select('DISTINCT(e.nombre) as empresa, count(r.id) as reserva, sum(r.cantidad_pasajeros) total');
        $this->db->from('reservas r');
        $this->db->join('empresas e' ,'r.id_empresa=e.id');
        $this->db->where('r.cancelada', 1);
        $this->db->where('r.fecha>=', $inicio);
        $this->db->where('r.fecha<=', $fin);
        $this->db->group_by("empresa");
        $this->db->order_by("empresa");
        $query = $this->db->get();
        return $query->result();
    }
    public function empresasReservasCanceladasTabla()
    {
        $this->db->select('DISTINCT(e.nombre) as empresa, count(r.id) as reserva, sum(r.cantidad_pasajeros) total');
        $this->db->from('reservas r');
        $this->db->join('empresas e' ,'r.id_empresa=e.id');
        $this->db->where('r.cancelada', 1);
        $this->db->group_by("empresa");
        $this->db->order_by("empresa");
        $query = $this->db->get();
        return $query->result();
    }
    public function empresasReservasCanceladas($y)
    {
        $this->db->select('DISTINCT(e.nombre) as empresa, count(r.id) as reserva');
        $this->db->from('reservas r');
        $this->db->join('empresas e' ,'r.id_empresa=e.id');
        $this->db->where('r.fecha >=', $y.'-01-01');
        $this->db->where('r.fecha <=', $y.'-12-31');
        $this->db->where('r.cancelada', 1);
        $this->db->group_by("empresa");
        $this->db->order_by("reserva DESC");
        $query = $this->db->get();
        return $query->result();
    }
    public function coordinadoresGrupo($y)
    {
        $this->db->select('DISTINCT(c.nombre) as coordinador, count(g.id) as grupo');
        $this->db->from('grupos g');
        $this->db->join('coordinadores c' ,'g.id_coordinador=c.id');
        $this->db->where('g.fecha >=', $y.'-01-01');
        $this->db->where('g.fecha <=', $y.'-12-31');
        $this->db->where('g.estado', 1);
        $this->db->where('g.activo', 0);
        $this->db->group_by("coordinador");
        $this->db->order_by("grupo DESC");
        $this->db->limit(10);
        $query = $this->db->get();
        return $query->result();
    }
    public function coordinadoresGrupoTabla()
    {
        $this->db->select('DISTINCT(c.nombre) as coordinador, c.dni as dni, count(g.id) as grupo, sum(g.total_personas) personas');
        $this->db->from('grupos g');
        $this->db->join('coordinadores c' ,'g.id_coordinador=c.id');
        $this->db->where('g.activo', 0);
        $this->db->group_by("coordinador");
        $this->db->order_by("coordinador");
        $query = $this->db->get();
        return $query->result();
    }

    public function coordinadoresGrupoTablaFecha($inicio,$fin)
    {
        $this->db->select('DISTINCT(c.nombre) as coordinador, c.dni as dni, count(g.id) as grupo, sum(g.total_personas) personas');
        $this->db->from('grupos g');
        $this->db->join('coordinadores c' ,'g.id_coordinador=c.id');
        $this->db->where('g.activo', 0);
        $this->db->where('g.fecha>=', $inicio);
        $this->db->where('g.fecha<=', $fin);
        $this->db->group_by("coordinador");
        $this->db->order_by("coordinador");
        $query = $this->db->get();
        return $query->result();
    }

    public function paquetes($y)
    {
        $this->db->select('DISTINCT(p.nombre) as paquete, count(r.id) as reserva');
        $this->db->from('reservas r');
        $this->db->join('paquetes p' ,'r.id_paquete=p.id');
        $this->db->where('r.fecha >=', $y.'-01-01');
        $this->db->where('r.fecha <=', $y.'-12-31');
        $this->db->where('r.estado', 0);
        $this->db->where('r.cancelada', 0);
        $this->db->group_by("paquete");
        $this->db->order_by("paquete");
        $query = $this->db->get();
        return $query->result();
    }
    public function paquetesTabla()
    {
        $this->db->select('DISTINCT(p.nombre) as paquete, count(r.id) as reserva,sum(cantidad_pasajeros) as pasajeros,p.descripcion desc');
        $this->db->from('reservas r');
        $this->db->join('paquetes p' ,'r.id_paquete=p.id');
        $this->db->where('r.estado', 0);
        $this->db->where('r.cancelada', 0);
        $this->db->group_by("paquete");
        $this->db->order_by("paquete");
        $query = $this->db->get();
        return $query->result();
    }
    public function paquetesTablaFecha($inicio,$fin)
    {
        $this->db->select('DISTINCT(p.nombre) as paquete, count(r.id) as reserva,sum(cantidad_pasajeros) as pasajeros,p.descripcion desc');
        $this->db->from('reservas r');
        $this->db->join('paquetes p' ,'r.id_paquete=p.id');
        $this->db->where('r.fecha>=', $inicio);
        $this->db->where('r.fecha<=', $fin);
        $this->db->where('r.estado', 0);
        $this->db->where('r.cancelada', 0);
        $this->db->group_by("paquete");
        $this->db->order_by("paquete");
        $query = $this->db->get();
        return $query->result();
    }
}