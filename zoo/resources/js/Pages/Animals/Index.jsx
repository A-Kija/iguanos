
import { AnimalProvider } from '@/AnimalsComponents/AnimalContext';
import Create from '@/AnimalsComponents/Create';
import List from '@/AnimalsComponents/List';
import 'bootstrap/dist/css/bootstrap.min.css';
import '../../../sass/animals.scss';
import Edit from '@/AnimalsComponents/Edit';


export default function Index({ url }) {

    return (
        <AnimalProvider url={url}>
        <div className="container">
            <div className="row">
                <div className="col-lg-4">
                    <Create />
                </div>
                <div className="col-lg-8">
                    <List />
                </div>
            </div>
        </div>
        <Edit />
        </AnimalProvider>
    );
}