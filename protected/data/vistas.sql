-- View: admin_final

-- DROP VIEW admin_final;

CREATE OR REPLACE VIEW admin_final AS 
 SELECT correspondencia.id,
    documentos.documento,
    directorio.id_area,
    directorio.cargo,
    directorio2.cargo AS cargo_des,
    directorio2.id_area AS area_des,
    datos_personales.nombre,
    datos_personales.apellido_p,
    datos_personales.apellido_m,
    datos_personales2.nombre AS nombre_des,
    datos_personales2.apellido_p AS apellidop_des,
    datos_personales2.apellido_m AS apellidom_des,
    correspondencia.tipo,
    documentos.tipo_docto,
    documentos.asunto,
    documentos.fecha
   FROM documentos
     JOIN correspondencia ON documentos.id = correspondencia.id_docto
     JOIN directorio ON documentos.remitente = directorio.id
     JOIN directorio directorio2 ON correspondencia.destinatario = directorio2.id
     JOIN datos_personales ON directorio.id_dp = datos_personales.id
     JOIN datos_personales datos_personales2 ON directorio2.id_dp = datos_personales2.id
  WHERE documentos.estado = 1;

ALTER TABLE admin_final
  OWNER TO kylix;


  -- View: admin_vista

-- DROP VIEW admin_vista;

CREATE OR REPLACE VIEW admin_vista AS 
 SELECT documentos.documento,
    directorio.id_area,
    directorio.cargo,
    directorio2.cargo AS cargo_des,
    directorio2.id_area AS area_des,
    datos_personales.nombre,
    datos_personales.apellido_p,
    datos_personales.apellido_m,
    datos_personales2.nombre AS nombre_des,
    datos_personales2.apellido_p AS apellidop_des,
    datos_personales2.apellido_m AS apellidom_des,
    correspondencia.tipo,
    documentos.tipo_docto,
    documentos.asunto,
    documentos.fecha
   FROM documentos
     JOIN correspondencia ON documentos.id = correspondencia.id_docto
     JOIN directorio ON documentos.remitente = directorio.id
     JOIN directorio directorio2 ON correspondencia.destinatario = directorio2.id
     JOIN datos_personales ON directorio.id_dp = datos_personales.id
     JOIN datos_personales datos_personales2 ON directorio2.id_dp = datos_personales2.id
  WHERE documentos.estado = 1;

ALTER TABLE admin_vista
  OWNER TO kylix;

  -- View: directorio_view

-- DROP VIEW directorio_view;

CREATE OR REPLACE VIEW directorio_view AS 
 SELECT areas.nombre AS area_nom,
    datos_personales.nombre,
    datos_personales.apellido_p,
    datos_personales.apellido_m,
    directorio.fecha_reg,
    directorio.cargo,
    directorio.status,
    directorio.id_dp,
    directorio.id,
    directorio.id_grupo,
    areas.id AS id_area
   FROM directorio
     JOIN areas ON areas.id = directorio.id_area
     JOIN datos_personales ON directorio.id_dp = datos_personales.id;

ALTER TABLE directorio_view
  OWNER TO kylix;

  -- View: entrada_view

-- DROP VIEW entrada_view;

CREATE OR REPLACE VIEW entrada_view AS 
 SELECT correspondencia.folio,
    documentos.fecha,
    documentos.documento,
    documentos.asunto,
    correspondencia.estado_acuse,
    directorio.id_area,
    tipo_doc.nombre,
    tipo_copia.nombre AS nombre2,
    correspondencia.id
   FROM correspondencia
     JOIN documentos ON documentos.id = correspondencia.id_docto
     JOIN directorio ON correspondencia.destinatario = directorio.id
     JOIN tipo_doc ON tipo_doc.id = documentos.tipo_docto
     JOIN tipo_copia ON correspondencia.tipo = tipo_copia.id;

ALTER TABLE entrada_view
  OWNER TO kylix;


-- View: salida_view

-- DROP VIEW salida_view;

CREATE OR REPLACE VIEW salida_view AS 
 SELECT correspondencia.folio,
    documentos.documento,
    documentos.fecha,
    documentos.estado,
    correspondencia.estado_acuse,
    directorio.id_area,
    tipo_doc.nombre,
    documentos.id,
    tipo_copia.nombre AS tipoc,
    documentos.asunto,
    correspondencia.tipo,
    correspondencia.id AS idc
   FROM documentos
     JOIN correspondencia ON documentos.id = correspondencia.id_docto
     JOIN directorio ON directorio.id = documentos.remitente
     JOIN tipo_doc ON tipo_doc.id = documentos.tipo_docto
     JOIN tipo_copia ON correspondencia.tipo = tipo_copia.id;

ALTER TABLE salida_view
  OWNER TO kylix;



-- View: turnos_view

-- DROP VIEW turnos_view;

CREATE OR REPLACE VIEW turnos_view AS 
 SELECT turnos.folio,
    turnos.estado,
    turnos.destinatario,
    directorio.id_area,
    turnos.fecha_turno,
    turnos.estado_sol,
    documentos.documento,
    documentos.asunto,
    turnos.id,
    turnos.remitente,
    directorio2.id_area AS id_area2
   FROM turnos
     JOIN directorio ON turnos.destinatario = directorio.id
     JOIN correspondencia ON correspondencia.id = turnos.id_corresp
     JOIN documentos ON documentos.id = correspondencia.id_docto
     JOIN directorio directorio2 ON turnos.remitente = directorio2.id;

ALTER TABLE turnos_view
  OWNER TO kylix;
