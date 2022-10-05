<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Kitchen extends Controller
{
    /**
     * Цена за квадратный метр берем из базы данных
     */
    public int $priceBox;
    public int $priceFacade;

    public int $heightKitchenTotal;
    public int $heightKitchenBoxDown;
    public int $kitchenDepth;
    public int $kitchenPriceAprons;
    public int $kitchenLengthTypeA;
    public int $kitchenLengthTypeB;
    public int $kitchenLengthTypeC;
    public int $pencilCaseForTheKitchenFridgeLength;
    public int $pencilCaseForTheKitchenMicrowaveLength;
    public int $pencilCaseForTheKitchenShelvesLength;
    public float $pricePencilCaseForTheKitchenFridge;
    public float $pricePencilCaseForTheKitchenMicrowave;
    public float $pricePencilCaseForTheKitchenShelves;
    public int $kitchenBoxTopLength;
    public int $kitchenBoxMiddleLength;
    public int $kitchenBoxWashingLength;
    public int $kitchenBoxDishwasherLength;
    public int $kitchenBoxShelvesLength;
    public int $kitchenBoxOvenLength;
    public int $kitchenBoxShelvesOptionsPrice;
    public int $kitchenBottleMakerLength;
    public int $kitchenBottleMakerOptionsPrice;
    public int $FalseFacadeHiLength;
    public int $FalseFacade1LowLength;
    public int $lengthAprons;
    protected int $kitchenTotalLength;
    protected int $kitchenTotalHeight;
    protected int $kitchenBoxTopHeight;
    protected int $kitchenBoxMiddleHeight;
    protected float $costBottleMaker;
    protected float $costBoxOven;
    protected float $costBoxShelves;
    protected float $costBoxDishwasher;
    protected float $costBoxWashing;
    protected float $costBoxMiddle;
    protected float $costBoxTop;
    protected float $costBoxTypeB;

    public function __construct($arr)
    {
        $this->priceBox = $arr['priceBox'];
        $this->priceFacade = $arr['priceFacade'];
        $this->heightKitchenTotal= $arr['heightKitchenTotal'];
        $this->heightKitchenBoxDown = $arr['heightKitchenBoxDown'];
        $this->kitchenDepth = $arr['kitchenDepth'];
        $this->kitchenPriceAprons = $arr['kitchenPriceAprons'];
        $this->kitchenPriceStol = $arr['kitchenPriceStol'];
        $this->kitchenLengthTypeA = $arr['kitchenLengthTypeA'];
        $this->kitchenLengthTypeB = $arr['kitchenLengthTypeB'];
        $this->kitchenLengthTypeC = $arr['kitchenLengthTypeC'];
        $this->pencilCaseForTheKitchenFridgeLength = $arr['pencilCaseForTheKitchenFridgeLength'];
        $this->pencilCaseForTheKitchenMicrowaveLength = $arr['pencilCaseForTheKitchenMicrowaveLength'];
        $this->pencilCaseForTheKitchenShelvesLength= $arr['pencilCaseForTheKitchenShelvesLength'];
        $this->pricePencilCaseForTheKitchenFridge= $arr['pricePencilCaseForTheKitchenFridge'];
        $this->pricePencilCaseForTheKitchenMicrowave= $arr['pricePencilCaseForTheKitchenMicrowave'];
        $this->pricePencilCaseForTheKitchenShelves= $arr['pricePencilCaseForTheKitchenShelves'];
        $this->kitchenBoxTopLength= $arr['kitchenBoxTopLength'];
        $this->kitchenBoxMiddleLength= $arr['kitchenBoxMiddleLength'];
        $this->kitchenBoxWashingLength= $arr['kitchenBoxWashingLength'];
        $this->kitchenBoxDishwasherLength= $arr['kitchenBoxDishwasherLength'];
        $this->kitchenBoxDishwasherLength= $arr['kitchenBoxOvenLength'];
        $this->kitchenBoxShelvesLength= $arr['kitchenBoxShelvesLength'];
        $this->kitchenBoxShelvesOptionsPrice = $arr['kitchenBoxShelvesOptionsPrice'];
        $this->kitchenBottleMakerLength= $arr['kitchenBottleMakerLength'];
        $this->kitchenBottleMakerOptionsPrice= $arr['kitchenBottleMakerOptionsPrice'];
        $this->FalseFacadeHiLength= $arr['FalseFacadeHiLength'];
        $this->FalseFacade1LowLength= $arr['FalseFacade1LowLength'];
        $this->lengthAprons = $arr['lengthAprons'];
        $this->lengthStol = $arr['lengthStol'];
    }

    /**
     * Произведем расчеты постоянных значений и установим их
     */
    public function initializeKitchen()
    {
        /**
         * @param $kitchenTotalLength. Сумма длинны кухни = длинна по размеру Б + длинна мойки + посудомойки + шкаф с полками + бутылошница.
         * @param $kitchenTotalHeight. Высота нижних модулей + верхних модулей + антресоли + фартук
         */
        $this->kitchenTotalLength = $this->kitchenLengthTypeB + $this->kitchenBoxWashingLength + $this->kitchenBoxDishwasherLength + $this->kitchenBoxShelvesLength + $this->kitchenBottleMakerLength;
        $this->kitchenTotalHeight = $this->heightKitchenTotal + 550;
        $this->kitchenBoxMiddleHeight = '600';
        $this->kitchenBoxTopHeight = $this->heightKitchenTotal - $this->heightKitchenBoxDown - $this->kitchenBoxMiddleHeight;

    }

    /**
     * @return int
     */
    public function getKitchenTotalLength(): int
    {
        return $this->kitchenTotalLength;
    }

    /**
     * Расчитаем стоимость Фартука для кухни
     * Расчет на длинну 3000 мм. если больше 3000 то считаем целый лист
     * @param int $lengthAprons
     * @return int
     */
    public function getCostAprons():int
    {

        $kitchenTotalLength = $this->lengthAprons;

        if($kitchenTotalLength < 3000)
        {
            $kitchenTotalLength = 3000 ;
        }

        $count = intdiv($kitchenTotalLength, 3000);

        return $count * $this->kitchenPriceAprons;
    }
    /**
     * Расчитаем стоимость Столешница для кухни
     * Расчет на длинну 3000 мм. если больше 3000 то считаем целый лист
     * @param int $lengthStol
     * @return int
     */
    public function getCostStol():int
    {

        $kitchenTotalLength = $this->lengthAprons;

        if($kitchenTotalLength < 3000)
        {
            $kitchenTotalLength = 3000 ;
        }

        $count = intdiv($kitchenTotalLength, 3000);

        return $count * $this->kitchenPriceStol;
    }

    /**
     * Вычислим стоимость от размеров высота и длинна
     * @param $price float Цена за квадратный метр фасада или модулей
     * @param $length int Длинна модуля в мм
     * @param $height int Высота модуля в мм
     * @return float
     */
    public function getCostPLH(float $price, int $length, int $height):float
    {
        if($length === 0){
            return 0;
        }else{
            return $price * ($length/1000) * ($height/1000);
        }
    }
    /**
     * Вычислим стоимость от размеров высота и длинна
     * и добавим стоимость дополнительных опций, ручки фурнитуру (устанавливается как постоянное значение)
     * @param $price float Цена за квадратный метр фасада или модулей
     * @param $length int Длинна модуля в мм
     * @param $height int Высота модуля в мм
     * @param $priceOptions float Цена дополнительных опций
     * @return float
     */
    public function getCostPLHD(float $price, int $length, int $height, float $priceOptions):float
    {
        if($length === 0)
        {
            return 0;
        }else{
            return (($price) * ($length/1000) * ($height/1000)) + $priceOptions;
        }

    }

    /**
     * Вычисление стоимости базовой комплектации без пеналов
     * @return int
     */
    public function sumBaseComplectations():int
    {
        //антресоли + верхние модули + длинна Б + шкаф под мойку + под посудомойку + 3 ящика + бутылошница
        $priceBox = $this->priceBox;
        $priceFacade = $this->priceFacade;
        $lTolal = $this->kitchenTotalLength;

        $costKitchenTopBox = $this->getCostPLH($priceBox, $lTolal, $this->kitchenBoxTopHeight);
        $costKitchenTopFacades = $this->getCostPLH($priceFacade, $lTolal, $this->kitchenBoxTopHeight);

        $costKitchenMiddleBox = $this->getCostPLH($priceBox, $lTolal, $this->kitchenBoxMiddleHeight);
        $costKitchenMiddleFacades = $this->getCostPLH($priceFacade, $lTolal, $this->kitchenBoxMiddleHeight);

        $costKitchentypeBBox = $this->getCostPLH($priceBox, $this->kitchenLengthTypeB, $this->heightKitchenBoxDown);
        $costKitchentypeBFacades = $this->getCostPLH($priceFacade, $this->kitchenLengthTypeB, $this->heightKitchenBoxDown);

        $costKitchenBoxWashingBox = $this->getCostPLH($priceBox, $this->kitchenBoxWashingLength, $this->heightKitchenBoxDown);
        $costKitchenBoxWashingFacades = $this->getCostPLH($priceFacade, $this->kitchenBoxWashingLength, $this->heightKitchenBoxDown);

        $costKitchenBoxDishwasherBox = $this->getCostPLH($priceBox, $this->kitchenBoxDishwasherLength, $this->heightKitchenBoxDown);
        $costKitchenBoxDishwasherFacades = $this->getCostPLH($priceFacade, $this->kitchenBoxDishwasherLength, $this->heightKitchenBoxDown);

        $costKitchenBoxShelvesBox = $this->getCostPLHD($priceBox, $this->kitchenBoxShelvesLength, $this->heightKitchenBoxDown, 7500);
        $costKitchenBoxShelvesFacades = $this->getCostPLHD($priceFacade, $this->kitchenBoxShelvesLength, $this->heightKitchenBoxDown, 0);

        $costKitchenBottleMakerBox = $this->getCostPLHD($priceBox, $this->kitchenBottleMakerLength, $this->heightKitchenBoxDown, 2500);
        $costKitchenBottleMakerFacades = $this->getCostPLHD($priceFacade, $this->kitchenBottleMakerLength, $this->heightKitchenBoxDown, 0);

        $costBox = $costKitchenTopBox + $costKitchenMiddleBox + $costKitchentypeBBox + $costKitchenBoxWashingBox + $costKitchenBoxDishwasherBox + $costKitchenBoxShelvesBox + $costKitchenBottleMakerBox;
        $costFacades = $costKitchenTopFacades + $costKitchenMiddleFacades + $costKitchentypeBFacades + $costKitchenBoxWashingFacades + $costKitchenBoxDishwasherFacades + $costKitchenBoxShelvesFacades + $costKitchenBottleMakerFacades;

        //return $costBox . '=' . $costKitchenTopBox .'+'. $costKitchenMiddleBox .'+'. $costKitchentypeBBox .'+'. $costKitchenBoxWashingBox .'+'. $costKitchenBoxDishwasherBox .'+'. $costKitchenBoxShelvesBox;
        return $costBox + $costFacades;
    }

    /**
     * Стоимость бутылошницы с фасадом
     * @return float
     */
    public function getCostBottleMaker(): float
    {
        $this->costBottleMaker = $this->getCostPLHD($this->priceBox, $this->kitchenBottleMakerLength, $this->heightKitchenBoxDown, $this->kitchenBottleMakerOptionsPrice) + $this->getCostPLHD($this->priceFacade, $this->kitchenBottleMakerLength, $this->heightKitchenBoxDown, 0);
        return $this->costBottleMaker;
    }

    /**
     * стоимость модулей для духовки
     * @return float
     */
    public function getCostOven(): float
    {
        $costBoxOven = $this->getCostPLH($this->priceBox, $this->kitchenBoxOvenLength, $this->heightKitchenBoxDown);
        $costBoxOvenFacades = $this->getCostPLH($this->priceFacade, $this->kitchenBoxOvenLength, $this->heightKitchenBoxDown);
        $this->costBoxOven = $costBoxOven + $costBoxOvenFacades;
        return $this->costBoxOven;
    }

    /**
     * Стоимость Шкаф с ящиками с фасадом
     * @return float
     */
    public function getCostBoxShelves(): float
    {
        $this->costBoxShelves = $this->getCostPLHD($this->priceBox, $this->kitchenBoxShelvesLength, $this->heightKitchenBoxDown, $this->kitchenBoxShelvesOptionsPrice) + $this->getCostPLHD($this->priceFacade, $this->kitchenBoxShelvesLength, $this->heightKitchenBoxDown, 0);
        return $this->costBoxShelves;
    }

    /**
     * Стоимость Шкафа для мойки
     * @return float
     */
    public function getCostBoxWashing(): float
    {
        $costKitchenBoxWashingBox = $this->getCostPLH($this->priceBox, $this->kitchenBoxWashingLength, $this->heightKitchenBoxDown);
        $costKitchenBoxWashingFacades = $this->getCostPLH($this->priceFacade, $this->kitchenBoxWashingLength, $this->heightKitchenBoxDown);
        $this->costBoxWashing = $costKitchenBoxWashingBox + $costKitchenBoxWashingFacades;
        return $this->costBoxWashing;
    }

    /**
     * Стоимость Шкафа для посудомойки
     * @return float
     */
    public function getCostBoxDishwasher(): float
    {
        $costKitchenBoxDishwasherBox = $this->getCostPLH($this->priceBox, $this->kitchenBoxDishwasherLength, $this->heightKitchenBoxDown);
        $costKitchenBoxDishwasherFacades = $this->getCostPLH($this->priceFacade, $this->kitchenBoxDishwasherLength, $this->heightKitchenBoxDown);
        $this->costBoxDishwasher = $costKitchenBoxDishwasherBox + $costKitchenBoxDishwasherFacades;
        return $this->costBoxDishwasher;
    }

    /**
     * Стоимость верхних модулей с фасадами
     * @return float
     */
    public function getCostBoxMiddle(): float
    {
        $costKitchenMiddleBox = $this->getCostPLH($this->priceBox, $this->kitchenLengthTypeB, $this->kitchenBoxMiddleHeight);
        $costKitchenMiddleFacades = $this->getCostPLH($this->priceFacade, $this->kitchenLengthTypeB, $this->kitchenBoxMiddleHeight);
        $this->costBoxMiddle = $costKitchenMiddleBox + $costKitchenMiddleFacades;
        return $this->costBoxMiddle;
    }

    /**
     * @return float
     */
    public function getCostBoxTop(): float
    {
        $costKitchenTopBox = $this->getCostPLH($this->priceBox, $this->kitchenBoxTopLength, $this->kitchenBoxTopHeight);
        $costKitchenTopFacades = $this->getCostPLH($this->priceFacade, $this->kitchenBoxTopLength, $this->kitchenBoxTopHeight);
        $this->costBoxTop = $costKitchenTopBox + $costKitchenTopFacades;
        return $this->costBoxTop;
    }

    /**
     * Стоимость ящиков на месте духовки (разница между выбранными модулями и общей длинной)
     * @return float
     */
    public function getCostBoxTypeB(): float
    {
        $costKitchentypeBBox = $this->getCostPLH($this->priceBox, $this->kitchenLengthTypeB, $this->heightKitchenBoxDown);
        $costKitchentypeBFacades = $this->getCostPLH($this->priceFacade, $this->kitchenLengthTypeB, $this->heightKitchenBoxDown);
        $this->costBoxTypeB = $costKitchentypeBBox + $costKitchentypeBFacades;
        return $this->costBoxTypeB;

    }

    /**
     * @return int|mixed
     */
    public function getKitchenBoxTopLength(): mixed
    {
        return $this->kitchenBoxTopLength;
    }

    /**
     * @param int $kitchenBottleMakerLength
     */
    public function setKitchenBottleMakerLength(int $kitchenBottleMakerLength): void
    {
        $this->kitchenBottleMakerLength = $kitchenBottleMakerLength;
    }

    /**
     * @param int $kitchenBoxOvenLength
     */
    public function setKitchenBoxOvenLength(int $kitchenBoxOvenLength): void
    {
        $this->kitchenBoxOvenLength = $kitchenBoxOvenLength;
    }

    /**
     * @param int|mixed $kitchenLengthTypeB
     */
    public function setKitchenLengthTypeB(mixed $kitchenLengthTypeB): void
    {
        $this->kitchenLengthTypeB = $kitchenLengthTypeB;
    }

    /**
     * @param int|mixed $kitchenBoxDishwasherLength
     */
    public function setKitchenBoxDishwasherLength(mixed $kitchenBoxDishwasherLength): void
    {
        $this->kitchenBoxDishwasherLength = $kitchenBoxDishwasherLength;
    }

    /**
     * @param int|mixed $kitchenBoxShelvesLength
     */
    public function setKitchenBoxShelvesLength(mixed $kitchenBoxShelvesLength): void
    {
        $this->kitchenBoxShelvesLength = $kitchenBoxShelvesLength;
    }

    /**
     * @param int|mixed $kitchenBoxWashingLength
     */
    public function setKitchenBoxWashingLength(mixed $kitchenBoxWashingLength): void
    {
        $this->kitchenBoxWashingLength = $kitchenBoxWashingLength;
    }

    /**
     * @param int|mixed $kitchenBoxTopLength
     */
    public function setKitchenBoxTopLength(mixed $kitchenBoxTopLength): void
    {
        $this->kitchenBoxTopLength = $kitchenBoxTopLength;
    }

    /**
     * @param int|mixed $priceFacade
     */
    public function setPriceFacade(mixed $priceFacade): void
    {
        $this->priceFacade = $priceFacade;
    }

    /**
     * @param int|mixed $lengthAprons
     */
    public function setLengthAprons(mixed $lengthAprons): void
    {
        $this->lengthAprons = $lengthAprons;
    }

    /**
     * @param mixed $lengthStol
     */
    public function setLengthStol(mixed $lengthStol): void
    {
        $this->lengthStol = $lengthStol;
    }
}
