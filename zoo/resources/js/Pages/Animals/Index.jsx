
import Create from '@/AnimalsComponents/Create';
import 'bootstrap/dist/css/bootstrap.min.css';

export default function Index() {

    return (
        <div className="container">
            <div className="row">
                <div className="col">
                    <Create />
                </div>
                <div className="col">
                    Column2
                </div>
            </div>
        </div>
    );
}