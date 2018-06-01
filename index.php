<?php 
interface MustHave
{
    function getFullDescription();
    function getDeliverPrice();
    function getDiscount();
}

trait Construct
{
    function __construct($name, $type, $price, $title)
    {
        parent::__construct($name, $price, $title);
        $this->type = $type;
    }	
} 

class Product implements MustHave {
	
    protected $value = 10;

       public function __construct($name, $price, $title)
       {
        $this->name = $name;
		$this->price = $price;
		$this->title = $title;		
       }
    function getDiscount()
    {
        if ($this->weight) {
            if ($this->weight > 10) {
                return round($this->price -($this->price * $this->value / 100) );
            }else {
                return $this->price;
            }		
        }elseif($this->weight == null) {
		    return round($this->price -($this->price * $this->value / 100) );
        }
    }
    function getDeliverPrice()
    {
        if ($this->getDiscount() == $this->price) {
            return "250 руб.";
        }else {
            return "300 руб.";
        }
    } 
    function getFullDescription()
    {
        echo "{$this->name} {$this->type} цена  {$this->getDiscount()} руб.  <br/> {$this->title}  <br/> цена доставки {$this->getDeliverPrice()}";
    }  
}

class SmartPhone extends Product  
{
    public $type;		
    use Construct;
}

echo "<p>";
$Xioami = new SmartPhone("Xioami ", "Redmi ", "9500  ", "Сделан в Китае" );
$Xioami -> getFullDescription();
echo "</p>";

echo "<p>";
$Iphone = new SmartPhone ("Iphone ", "10", "100000  ", "Сделан в США");
$Iphone -> getFullDescription();
echo "</p>";

class Spinner extends Product 
{
    public $type;		
    use Construct;
}

echo "<p>";
$chehol = new Spinner("Оригинальнный чехол для телефона с личным фото ", "книжка ", "1500 ", "Сделано в России" );
$chehol-> getFullDescription();
echo "</p>";

echo "<p>";
$chehol2 = new Spinner ("Чехол для телефона  ", "бампер", "100 ", "Сделан в Китае");
$chehol2 -> getFullDescription();
echo "</p>";

class Cement extends Product 
{
    public $weight;
	
    function __construct($name, $weight, $price, $title)
    {
        parent::__construct($name, $price, $title);
        $this->weight = $weight;		
    }	
}
echo "<p>";
$pomi1 = new Cement("помидоры ", "10 кг ", "890руб.", "Турция" );
$pomi1 -> getFullDescription();
echo "</p>";
echo "<p>";
$pomi2 = new Cement ("помидоры", "5 кг ", "200руб.", "Сделан во РФ");
$pomi2 -> getFullDescription();
echo "</p>";


?>

Наследование - метод в ООП, позволяющий использовать методы исвойства  у суперкласса, у  классов, которые являються потомками потомкам.<br />
   Полиморфизм - классы в ООП могут иметь одинаковые методы, но по разному егго реализуют.<br /><br />

Отличие интерфейсов от абстрактных классов в том, что в интерфейсах нельзя писать реализацию методов, а так же в интерфейсах нельзя указывать поля.<br />
   Классы могут наследовать сколько угодно интерфейсов, а абстрактный первый класс.

 