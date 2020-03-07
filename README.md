# Tema-Origen

<div  align="center">
<br>
<img  width="70%"  src="https://www.mowomo.com/wp-content/uploads/2018/04/logo-mowomo.png"  alt="Logo de mowomo">
<br>
<br>
</div>

# 📦 `Origen`

> `Origen` es un tema base creado por `mowomo.com` con ❤️ para el desarrollo de temas para WordPress.
> `Version 1.0.0`

## Configuración VSCODE
Para utilizar el SCSS correctamente necesitaras la siguiente configuración del setting.json en VSCODE para las versiones 1.x.x de `Origen`:
<pre>
{
    "editor.insertSpaces": false,
    "editor.renderWhitespace": "none",
    "window.zoomLevel": 0,
    "git.autofetch": true,
    "liveSassCompile.settings.formats":[
        // This is Default.
        {
            "format": "expanded",
            "extensionName": ".css",
            "savePath": "~/../css/"
        },
        // More Complex
        {
            "format": "compressed",
            "extensionName": ".min.css",
            "savePath": "~/../css/"
        }
    ],
    "git.confirmSync": false,
    "git.enableSmartCommit": true
}
</pre>

## Metodología CSS

`Origen` ha sido desarrollado con `SCSS` utilizando la metodología `Block, Element, Modifier (BEM)` para el nombrado de clases CSS.

## SCSS
### Variables

Las `variables` en funcionan de manera similar a la de cualquier lenguaje de programacion. Las variables que definamos serán globales y se podrán utilizar desde cualquier archivo `SCSS` del tema.

Para definir una `variable` utililizando `$nombre`. Por ejemplo:

<pre>
	$variable-color = "#eee";
	$variable-alto  = 30px;
</pre>

Si queremos que la `variable` no sea `global` deberemos inicializarla dentro de una `clase`.

<pre>
	.contenedor{
		$variable-color: red;
	}
</pre>

La vida de esta `variable` estará limitada a la de la clase donde la hemos inicializado en este caso `.contenedor`.

### Extend

El `@extend` es basicamente como una herencia en un lenguaje de programación. Un selector va a heredar las propiedades de otro.

Vamos a utilizar esta propiedad cuando vamos a realizar `modificadores`de un **bloque** o **elemento**.

Un caso practico:

- `SASS`

<pre>
	.boton{
		padding: 1rem;
		cursor: pointer;
		color: #fff;
	}

	.boton--cancelar{
		@extend .boton;
		background: red;
	}
</pre>

- `CSS`

<pre>
	.boton, .boton--cancelar{
		padding: 1rem;
		cursor: pointer;
		color: #fff;
	}

	.boton--cancelar{
		background: red;
	}
</pre>

Como podemos ver en la versión `CSS`, los selectores son combinados en vez de tener repetir las mismas declaraciones una y otra vez.

### Mixins

Los `@mixins` son como si fueran clases constructoras en un lenguaje de programación. Con los `mixins` podemos coger un grupo de declaraciones CSS y volver a utilizarlas donde queramos.

Los `mixins` aceptan **argumentos** para poder añadirle valores.

Un ejemplo practico:

El siguiente ejemplo es para crear por ejemplo media querys de manera ágil.

- `SCSS`

<pre>
	@mixin media($break){
		@media screen and (min-width:$break){
			@content;
		}
	}
</pre>

Como vemos para crear un `mixin` lo inicializamos con `@mixin`.

Luego a la hora de usarlo lo llamaremos con `@include` y el nombre que le hayamos dado al `mixin`. Si necesita algun argumento se lo pondremos entre parentecis como en el ejemplo, si tiene más de un argumento lo separeremos con comas.

Ejemplo de uso:

<pre>
	@include media(768px){
		div{
			width:100%;
		}
	}
</pre>

- `CSS`

<pre>
	@media screen and (min-width:768px){
		div{
			width:100%;
		}
	}
</pre>

### Funciones

`SCSS` ofrece **funciones** de forma predeterminada. Si quieres conocer cuales son estás funciones las puedes encontrar todas en su documentación oficial https://sass-lang.com/documentation/functions/list.

## Estándares de codificación CSS

`Origen` al estar realizado con **SCSS** basaremos los estandares en la escritura de **CSS** con este lenguaje de precompilado.

### Estructura

Al usar un lenguaje de precompilado no vamos a poder controlar al 100% lo que genera de **CSS** por lo que vamos a dar prioridad a la legibilidad dentro de `SCSS` y escribir un código lo más optimo posible para cuando se compile en `CSS`.

- Entre sentencia y sentecia debe haber un espacio en blanco para favorecer la legibilidad.
	- Correcto:
	<pre>
		.selector-1{
			background: red;
		}

		.selector-2{
			color: blue;
		}

		.selector-3{
			color: #ddd;
		}
	</pre>

	- Incorrecto:
	<pre>
		.selector-1{
			background: red;
		}
		.selector-2{
			color: blue;
		}
		.selector-3{
			color: #ddd;
		}
	</pre>

- Cuando un **selector** utilice las propiedades de otro selector utilizaremos la propiedad `@extend` de **SCSS** en vez de utilizar `,`y concatenar.

	- Correcto:
	<pre>
		.selector-1{
			width: 100px;
			height: 100px;
			display: block;
		}

		.selector-2{
			@extend .selector-1;
			background: red;
		}

		.selector-3{
			@extend .selector-1;
			background: blue;
		}
	</pre>

	- Incorrecto:
	<pre>
		.selector-1, .selector-2, .selector-3{
			width: 100px;
			height: 100px;
			display: block;
		}

		.selector-2{
			background: red;
		}

		.selector-3{
			background: blue;
		}
	</pre>

- Cada propiedad debe tener su propia linea con un punto y coma al final y un salto de linea. Todas las propiedades del selector deben tener un tabulado respecto al selector y las llaves debe estar al mismo nivel que el selector.

	- Correcto:
	<pre>
		.selector-1{
			background: red;
		}

		.selector-2{
			color: blue;
		}

		.selector-3{
			color: #ddd;
		}
	</pre>

	- Incorrecto:
	<pre>
		.selector-1{
		background: red;
		}

		.selector-2{
			color: blue;
			}

		.selector-3{
			color: #ddd; background: blue;
		}
	</pre>

### Selectores

Para crear los selectores lo haremos siempre en castellano

#### Nombrado de clases (BEM)

En la metodología `BEM` encontramos tres entidades que debemos entender y tener ser capaz de distinguir:

- `Bloque`: Un bloque debe ser un elemento independiente que tenga sentido por si sola, como por ejemplo, menu, logo o banner.
- `Elemento`: Un elemento es un componente de un bloque. No tiene significado por si solo. Por ejemplo, un elemento del menú, un elemento de una lista...
- `Modificador`: Los modificadores son alteraciones de un bloque o elemento. Por ejemplo, un tipo distinto de botón.

La sintaxis del sistema `BEM` sería la siguiente:

<pre>
	.bloque
	.bloque--modificador
	.bloque__elemento
	.bloque__elemento--modificador
</pre>

Un caso practico sería el siguiente:

- `HTML`:
```html

<button class="boton"> Botón normal </button>
<button class="boton boton--alerta"> Botón alerta </button>

```

- `CSS`:
<pre>
	.boton {
		border-radius: 5px;
		padding: .5rem 1rem;
		border: 1px solid #777;
		color:#fff;
		background: gren;
	}
	.boton--alerta {
		background: red;
	}
</pre>

Los `bloques` los voy a poder reutilizar en cualquier momento y por ello ahorrar código como es en este caso `.boton`. Y gracias a los `modificadores` como es en este caso `.boton--alerta` consigo modificaciones de este bloque. En este caso crearía un botón para alerta rojo.

#### Marcado BEM con SCSS

`Origen` utiliza `SCSS` para el desarrollo de las hojas de estilos del tema. Esto lo debemos combinar con el marcado `BEM` que hemos explicado anteriormente.

#### Anidación

Con `SCSS` puedes organizar tu hoja de estilo de manera que se asemeja a la de `HTML`.

Con `Origen` no anidamos más de 3 elementos.

Un caso practico:
```html

<div class="contenedor">
	<p>Soy un texto</p>
</div>

```
<pre>
	.contenedor{
		border-radius: 5px;
		padding: .5rem 1rem;
		border: 1px solid #777;
		background: #7d7d7d;

		p{
			color:red;
		}

	}
</pre>

### Propiedades

### Valores

### Media Queries

### Comentarios

### Variables

