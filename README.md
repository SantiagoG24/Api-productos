End points


(GET)/api/ofertas

Devuelve todas las ofertas



(GET)/api/ofertas:ID

Devuleve la informacion de la oferta relacionada al ID ingresado



(POST)/api/ofertas

Agrega una oferta enviandole un JSON en el body de la request como se muestra:

{
  "nombre":"Buzo de NAVI",
  
  "descripcion":"Buzo ESports Team navi 2022 negro",
  
  "descuento":"15",
  
  "id_categoria":"2"
  
}



(DELETE)/api/ofertas:ID

Borra la oferta relacionada al ID ingresado
