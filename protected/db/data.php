<?php
function niveles($this)
    {
        $sql="select * from speakup.niveles order by id asc";
        return (cargar_data($sql,$this));
    }
function locaciones($this)
    {
        $sql="select * from speakup.locaciones";
        return (cargar_data($sql,$this));
    }
function estados($this)
    {
        $sql="select * from speakup.estados";
        return (cargar_data($sql,$this));
    }
function programas($this)
    {
        $sql="select * from speakup.programas order by id asc";
        return (cargar_data($sql,$this));
    }
function status($this)
    {
        $sql="select * from speakup.status";
        return (cargar_data($sql,$this));
    }
function tipos_acceso($this)
    {
        $sql="select * from speakup.tipos_acceso";
        return (cargar_data($sql,$this));
    }
function tipos_clases($this)
    {
        $sql="select * from speakup.tipos_clases";
        return (cargar_data($sql,$this));
    }

function salones($this)
    {
        $sql="select * from speakup.salones";
        return (cargar_data($sql,$this));
    }

function turnos_clases($this)
    {
        $sql="select tc.*, tp.descripcion as tipo_clase, n.descripcion as descripcion_nivel, s.nombre as nombre_salon
              from speakup.turnos_clases tc, tipos_clases_nivel_imagen n, tipos_clases tp, salones s
              where (tc.nivel = n.nivel) and (tc.tipo = n.cod_tipo) and (tc.tipo = tp.cod_tipo) and (tc.cod_salon = s.cod_salon)";
        return (cargar_data($sql,$this));
    }

function un_turno_clase($cod,$this)
    {
        $sql="select tc.*, tp.descripcion as tipo_clase, n.descripcion as descripcion_nivel, s.nombre as nombre_salon
              from speakup.turnos_clases tc, tipos_clases_nivel_imagen n, tipos_clases tp, salones s
              where (tc.nivel = n.nivel) and (tc.tipo = n.cod_tipo) and (tc.tipo = tp.cod_tipo) and (tc.cod_salon = s.cod_salon)
                    and (tc.cod_turno = '$cod')";
        return (cargar_data($sql,$this));
    }

function inscritos_en_turno_clase($cod,$this)
    {
        $sql="select em.*, ta.id as idta
              from estudiantes_menores em, turnos_alumnos ta
              Where (em.cod_menor = ta.cod_menor) and (ta.cod_turno = '$cod')";
        return (cargar_data($sql,$this));
    }

function ver_mensaje_al_usuario($this)
    {
        $sql="select mensaje
              from mensajes_usuarios
              where (estatus = '1')
              Limit 1";
        $resultado=cargar_data($sql,$this);
        return $resultado[0]['mensaje'];
    }

function menores_por_padre($cedula,$this)
    {
        $sql="select * from speakup.estudiantes_menores em
              where em.cedula_padre = '$cedula'";
        return (cargar_data($sql,$this));
    }

function menores_no_inscritos($cedula,$cod,$this)
    {
        $inscritos = codigos_menores_inscritos($cod,$this);
        $sql="select * from speakup.estudiantes_menores em
              where em.cedula_padre = '$cedula' and em.cod_menor not in (select em.cod_menor
              from estudiantes_menores em, turnos_alumnos ta
              Where (em.cod_menor = ta.cod_menor) and (ta.cod_turno = '$cod'))";
        return (cargar_data($sql,$this));
    }

function codigos_menores_inscritos($cod,$this)
    {
        $sql="select em.cod_menor
              from estudiantes_menores em, turnos_alumnos ta
              Where (em.cod_menor = ta.cod_menor) and (ta.cod_turno = '$cod')";
        return (cargar_data($sql,$this));
    }


?>
