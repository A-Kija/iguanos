import { useState } from 'react';
import './App.scss';
import Checkbox from './Components/006/Checkbox';
import Fancy from './Components/006/Fancy';
import Input from './Components/006/Input';
import Input2 from './Components/006/Input2';
import Radio from './Components/006/Radio';
import Select from './Components/006/Select';
import './buttons.scss';


function App() {

    const [showRadio, setShowRadio] = useState(true);

  return (
    <div className="App">
      <header className="App-header">
        <button className="red" onClick={_ => setShowRadio(!showRadio)}>Toggle Radio</button>
        {
            showRadio && <Radio />
        }
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