<?php
// Módulo Factura - práctica Git por Dariuxpy

class Factura {

    public $producto;
    public $cantidad;
    public $precio;

    public function __construct($producto, $cantidad, $precio) {
        $this->producto = $producto;
        $this->cantidad = $cantidad;
        $this->precio = $precio;
    }

    public function calcularTotal() {
        return $this->cantidad * $this->precio;
    }

    public function mostrarFactura() {
        $total = $this->calcularTotal();

        echo "<h2>🧾 Factura</h2>";
        echo "<p><strong>Producto:</strong> " . $this->producto . "</p>";
        echo "<p><strong>Cantidad:</strong> " . $this->cantidad . "</p>";
        echo "<p><strong>Precio unitario:</strong> $" . $this->precio . "</p>";
        echo "<p><strong>Total:</strong> $" . $total . "</p>";
    }
}

// Ejemplo de uso
$factura = new Factura("Teclado", 2, 50);
$factura->mostrarFactura();

?>