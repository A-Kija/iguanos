import './App.scss';
import Checkbox from './Components/006/Checkbox';
import Fancy from './Components/006/Fancy';
import Input from './Components/006/Input';
import Input2 from './Components/006/Input2';
import Select from './Components/006/Select';
import './buttons.scss';


function App() {
  return (
    <div className="App">
      <header className="App-header">
        <Checkbox />
        <Select />
        <Fancy />
        <Input2 />
        <Input />
      </header>
    </div>
  );
}

export default App;