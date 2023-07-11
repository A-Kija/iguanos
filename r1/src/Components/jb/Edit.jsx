import { KEY } from '../../jb';
import { update } from '../../Functions/localStarage';
import { useState, useEffect } from 'react';

export default function Edit({ setEditData, editData, setLastUpdate }) {


  const [name, setName] = useState('');
  const [age, setAge] = useState('14');
  const [sn, setSn] = useState('');

  useEffect(_ => {
    if (editData) {
      setName(editData.name);
      setAge('' + editData.age);
      setSn(editData.sn);
    }
  }, [editData]);

  useEffect(_ => {
    if (age < 30) {
        setSn('tiktok');
        return
    }
    if (age < 60) {
        setSn('instagram');
        return
    }
    setSn('facebook');
}, [age]);

  const handleChange = e => {
    setName(e.target.value);
  }

  const handleChangeRange = e => {
    setAge(e.target.value);
  }

  const check = key => {
    if (sn === key) {
      setSn('');
      return;
    }
    setSn(key);
  }

  
  const doEdit = _ => {
    update(KEY, editData.id, {
      name,
      age: +age,
      sn
    });
    setEditData(null);
    setLastUpdate(Date.now());
  }


  return (
    <div className="modal show">
      <div className="modal-dialog modal-dialog-centered">
        <div className="modal-content">
          <div className="modal-header">
            <h5 className="modal-title">Edit</h5>
            <button type="button" className="btn-close" onClick={_ => setEditData(null)}></button>
          </div>
          <div className="modal-body">
            <fieldset>
              <legend>Social network lover</legend>
              <div className="mt-3">
                <input type="text" value={name} onChange={handleChange} />
              </div>
              <div className="mt-3">
                <label className="form-label"><h3>Years: {age.padStart(2, '0')}</h3></label>
                <input className="form-range" type="range" min="14" max="99" value={age} onChange={handleChangeRange} />
              </div>
              <div className="mt-3">
                <div>
                  <label className={sn === 'tiktok' ? 'radio checked' : 'radio'} onClick={_ => check('tiktok')}>TIK TOK</label>
                  <label className={sn === 'instagram' ? 'radio checked' : 'radio'} onClick={_ => check('instagram')}>Instagram</label>
                  <label className={sn === 'facebook' ? 'radio checked' : 'radio'} onClick={_ => check('facebook')}>FB</label>
                </div>
              </div>
            </fieldset>
          </div>
          <div className="modal-footer">
            <button type="button" className="nice green small no" onClick={_ => setEditData(null)}>Close</button>
            <button type="button" className="nice red small no" onClick={doEdit}>Edit</button>
          </div>
        </div>
      </div>
    </div>
  )


}