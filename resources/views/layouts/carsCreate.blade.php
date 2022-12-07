<div class="form-row col-md-10">
    <div class="form-group col-md-2">
        <label for="mark">Марка</label>
        <input type='text' name='mark' placeholder="Марка" id='mark' class='form-control'>
    </div>
    <div class="form-group col-md-2">
        <label for="model">Модель</label>
        <input type='text' name='model' placeholder="Модель" id='model' class='form-control'>
    </div>
    <div class="form-group col-md-2">
        <label for="color">Цвет</label>
        <input type='color' name='color' id='color' class='form-control'>
    </div>
</div>
<div class="form-row col-md-10">
    <div class="form-group col-md-2">
        <label for="number">Гос. номер</label>
        <input type='text' name='number' placeholder="a 111 aa" id='number' class='form-control'>
    </div>
    <div class="form-group col-md-2">
        <label for="region">Регион</label>
        <input type='number' name='region' placeholder="34" id='region' class='form-control' min="1" max="999">
    </div>
    <div class="form-group col-md-4">
        <label for="status">Состояние</label>
        <select name="status" class='form-control'>
                <option>Присутствует</option>
                <option>Отсутствует</option>
            </select>  
    </div> 
</div>

{{--проверено перед commit--}}
