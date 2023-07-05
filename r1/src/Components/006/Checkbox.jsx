import { useState } from 'react';
function Checkbox() {

    const [cb, setCb] = useState({
        A: false,
        B: true,
        C: false,
        D: false
    });

    const check = key => {
        setCb(c => ({
            ...c,
            [key]: !c[key]
        }));
    }



    return (
        <fieldset>
            <legend>Checkboxes</legend>

            <div>
                <label className={cb.A ? 'checkbox checked' : 'checkbox'} onClick={_ => check('A')}>A</label>
                <label className={cb.B ? 'checkbox checked' : 'checkbox'} onClick={_ => check('B')}>B</label>
                <label className={cb.C ? 'checkbox checked' : 'checkbox'} onClick={_ => check('C')}>C</label>
                <label className={cb.D ? 'checkbox checked' : 'checkbox'} onClick={_ => check('D')}>D</label>
            </div>


        </fieldset>
    );
}

export default Checkbox;