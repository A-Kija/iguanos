const dogs = ['šuo', 'šunius', 'Bobikas', 'kudlius', 'Šarikas', 'avigalvis', 'Šuo'];

function Dogs4() {
    return (
        <div>
            <h2>Dogs5</h2>
            <div className="sq-bin">
                {
                    dogs.map((dog, i) =>
                        <div className="sq" key={i} style={{
                            backgroundColor: dog.length > 6 ? '#adff2f50' : '#dc143c50',
                            borderColor: dog.length > 6 ? '#adff2f' : '#dc143c'
                        }}>
                            {dog} <i>{dog.length}</i>
                        </div>
                    )
                }
            </div>
        </div>
    );
}
export default Dogs4;