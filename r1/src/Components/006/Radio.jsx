import { useEffect, useState } from 'react';
function Radio() {

    const [radio, setRadio] = useState('C');
    const [radioText, setRadioText] = useState('Radios');


    useEffect(_ => {
        console.log('Radio Loaded');
        return _ => console.log('Radio Unloaded');
    }, []);

    useEffect(_ => {
        console.log('Radio Changed');
        changeRadioText(radio);
    }, [radio]);
    

    const changeRadioText = key => {
        if (key === 'B') {
            setRadioText('Hello Radio');
            return;
        }
        setRadioText('Radios');
    }


    const check = key => {
        if (radio === key) {
            setRadio('');
            return;
        }
        setRadio(key);
    }


    return (
        <fieldset>
            <legend>{radioText}</legend>

            <div>
                <label className={radio === 'A' ? 'radio checked' : 'radio'} onClick={_ => check('A')}>A</label>
                <label className={radio === 'B' ? 'radio checked' : 'radio'} onClick={_ => check('B')}>B</label>
                <label className={radio === 'C' ? 'radio checked' : 'radio'} onClick={_ => check('C')}>C</label>
                <label className={radio === 'D' ? 'radio checked' : 'radio'} onClick={_ => check('D')}>D</label>
            </div>


        </fieldset>
    );
}

export default Radio;