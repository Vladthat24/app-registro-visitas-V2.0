create proc Carga_Registro_Visita
as
--crear tabla temporal como respaldo
select top 0 * into #tmpRegistroVisita from Tap_RegistroVisita

--realizar la carga masiva a la tabla temporal
bulk insert #tmpRegistroVisita
from 'C:\Tap_RegistroVisitas.txt'
with
	(
	rowterminator='\n',
	fieldterminator=';'
	)

--obtener los funcionarios nuevos
select a.* 
into #tmpRegitroVisita_Nuevos
from #tmpRegistroVisita a left join Tap_RegistroVisita b on a.id=b.id
where b.id is null

--obtener los funcionarios repetidos
select a.* 
into #tmpRegistroVisita_Repetidos
from #tmpRegistroVisita a inner join Tap_RegistroVisita b on a.id=b.id

--actualizar los funcionarios repetidos

update a
set a.idfuncionario=b.idfuncionario,
	a.motivo=b.motivo,
	a.servidor_publico=b.servidor_publico,
	a.area_oficina_sp=b.area_oficina_sp,
	a.cargo=b.cargo,
	a.fecha_ingreso=b.fecha_ingreso,
	a.hora_ingreso=b.hora_ingreso,
	a.fecha_salida=b.fecha_salida,
	a.hora_salida=b.hora_salida,
	a.usuario=b.hora_salida
from Tap_RegistroVisita a inner join #tmpRegistroVisita_Repetidos b on a.id=b.id

--insertar los funciones nuevos
insert into Tap_RegistroVisita (idfuncionario,motivo,servidor_publico,area_oficina_sp,cargo,fecha_ingreso,hora_ingreso,fecha_salida,hora_salida,usuario) 
select idfuncionario,motivo,servidor_publico,area_oficina_sp,cargo,fecha_ingreso,hora_ingreso,fecha_salida,hora_salida,usuario from #tmpRegitroVisita_Nuevos

--Listar la Tabla Funcionario con los datos agregados
select * from Tap_RegistroVisita

--eliminar tablas temporales
drop table #tmpRegistroVisita
drop table #tmpRegitroVisita_Nuevos
drop table #tmpRegistroVisita_Repetidos

select * from #tmpRegitroVisita_Nuevos
select * from Tap_Funcionario
select * from Tap_RegistroVisita

alter table Tap_RegistroVisita
add constraint FK_Tap_RegistroVisita_Tap_Funcionario
foreign key (idfuncionario)
references Tap_Funcionario(id);