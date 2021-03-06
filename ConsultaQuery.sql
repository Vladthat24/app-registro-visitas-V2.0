/****** Script para el comando SelectTopNRows de SSMS  ******/
/****** Script para el comando SelectTopNRows de SSMS  ******/
SELECT TOP 1000 [id]
      ,[entidad]
      ,[fecha_registro]
  FROM [dirislim_visita].[dbo].[Tap_Entidad]

 

  insert into dirislim_visita.dbo.Tap_Funcionario 
  values(1,'76244566','YOSSHI SALVADOR CONDORI MENDIETA',6,'COORDINARIO DE LA FACULTAD DE ING. SISTEMAS',SYSDATETIME());

  
  use dirislim_visita;
  declare @tabla varchar(15);
  set @tabla='Tap_Funcionario';

  select Tap_TipoDocumento.tipo_documento as tipo_documento, num_documento, nombre,
  (select entidad from Tap_Entidad where id=identidad)as entidad,cargo,convert(date,Tap_Funcionario.fecha_registro)as fecha_registro 
  from Tap_Funcionario
  inner join Tap_TipoDocumento on Tap_Funcionario.idtipo_documento=Tap_TipoDocumento.id ORDER BY Tap_Funcionario.id DESC;

  update dirislim_visita.dbo.Tap_Funcionario  set fecha_registro=SYSDATETIME() WHERE id=1;


SELECT TOP 1000 [id]
      ,[idfuncionario]
      ,[motivo]
      ,[fecha_ingreso]
      ,[fecha_salida]
      ,[usuario]
  FROM [dirislim_visita].[dbo].[Tap_RegistroVisita]

  USE dirislim_visita;
  insert into Tap_RegistroVisita 
  values(1,1,'COORDINACION POR EL TEMA DE COVID 19',
  SYSDATETIME(),CONVERT(datetime,'2020-06-24 06:35:46',120),
  'YOSSHI SALVADOR CONDORI MENDEITA');

  select Tap_RegistroVisita.id as id,
  Tap_Funcionario.num_documento as num_dni_funcionario,
  Tap_Funcionario.nombre as nombre_funcionario,
  Tap_Funcionario.cargo as cargo_funcionario,
  Tap_Entidad.entidad as entidad_funcionario,
  motivo,
  fecha_ingreso,
  fecha_salida,
  usuario 
  from Tap_RegistroVisita 
  inner join Tap_Funcionario 
  on 
  Tap_RegistroVisita.idfuncionario=Tap_Funcionario.id inner join Tap_Entidad on Tap_Funcionario.identidad=Tap_Entidad.id;