
let form = document.querySelector('form');

form.addEventListener('submit', function(e){
    e.preventDefault();
    let height = parseInt(document.getElementById('height').value);
    let weight = parseInt(document.getElementById('weight').value);
    let result = document.getElementById('result');
    
    result.style.display = 'block';

    if ((height === '') || (height < 0) || (isNaN(height)) ) {
        result.innerHTML = `${height} is Invalid Height <br/> Please provide valid Height`;
    } else if ((weight === '') || (weight < 0) || (isNaN(weight)) ) {
        result.innerHTML = `${weight} is Invalid Weight <br/> Please provide valid Weight`;
    } else {
        let bmi = (weight / ((height * height) / 10000)).toFixed(2);
        if (bmi < 18.6) {
            result.innerHTML = `BMI = ${bmi} <br/> This is Under Weight`;
        } else if (bmi > 24.9){
            result.innerHTML = `BMI = ${bmi} <br/> This is Over Weight`;
        } else if(bmi > 18.6 && bmi < 24.9){
            result.innerHTML = `BMI = ${bmi} <br/> This is Normal Weight`;
        }
    }
});