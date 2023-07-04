const dogs = ['šuo', 'šunius', 'Bobikas', 'kudlius', 'Šarikas', 'avigalvis'];

function Dogs4() {
    return (
        <div>
            <h2>Dogs4</h2>
            <div className="sq-bin">
                {
                    dogs.filter(dog => dog[0] === dog[0].toUpperCase()).map((dog, i) =>
                        <div className="sq" key={i}>
                            {dog}
                        </div>
                    )
                }
            </div>
        </div>
    );
}
export default Dogs4;