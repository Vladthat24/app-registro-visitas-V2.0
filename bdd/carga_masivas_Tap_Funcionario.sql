create proc Carga_Cliente
as

--crear tabla temporal como respaldo
select top 0 * into #tmpFuncionario from Tap_Funcionario

--realizar la carga masiva a la tabla temporal
bulk insert #tmpFuncionario
from 'C:\Tap_Visitantes.txt'
with
	(rowterminator='\n',
	fieldterminator=';'
	)

--obtener los funcionarios nuevos
select a.* 
into #tmpFuncionario_Nuevos
from #tmpFuncionario a left join Tap_Funcionario b on a.id=b.id
where b.id is null

--obtener los funcionarios repetidos
select a.* 
into #tmpFuncionario_Repetidos
from #tmpFuncionario a inner join Tap_Funcionario b on a.id=b.id

--actualizar los funcionarios repetidos

update a
set a.idtipo_documento=b.idtipo_documento,a.num_documento=b.num_documento,
	a.nombre=b.nombre,a.identidad=b.identidad,a.cargo=b.cargo,a.fecha_registro=b.fecha_registro
from Tap_Funcionario a inner join #tmpFuncionario_Repetidos b on a.id=b.id

--insertar los funciones nuevos
insert into Tap_Funcionario (idtipo_documento,num_documento,nombre,identidad,cargo,fecha_registro) 
select idtipo_documento,num_documento,nombre,identidad,cargo,fecha_registro from #tmpFuncionario_Nuevos

--Listar la Tabla Funcionario con los datos agregados
select * from Tap_Funcionario

--eliminar tablas temporales
drop table #tmpFuncionario
drop table #tmpFuncionario_Nuevos
drop table #tmpFuncionario_Repetidos
