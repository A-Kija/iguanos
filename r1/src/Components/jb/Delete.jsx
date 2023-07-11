import { KEY } from '../../jb';
import { destroy } from '../../Functions/localStarage';

export default function Delete({ setDeleteData, deleteData, setLastUpdate }) {

  const doDestroy = _ => {
    destroy(KEY, deleteData.id);
    setDeleteData(null);
    setLastUpdate(Date.now());
  }


  return (
    <div className="modal show">
      <div className="modal-dialog modal-dialog-centered">
        <div className="modal-content">
          <div className="modal-header">
            <h5 className="modal-title">Confirm</h5>
            <button type="button" className="btn-close" onClick={_ => setDeleteData(null)}></button>
          </div>
          <div className="modal-body">
            <p>Are you really want to delete this nice person?</p>
          </div>
          <div className="modal-footer">
            <button type="button" className="nice green small no" onClick={_ => setDeleteData(null)}>Close</button>
            <button type="button" className="nice red small no" onClick={doDestroy}>Delete</button>
          </div>
        </div>
      </div>
    </div>
  );
}