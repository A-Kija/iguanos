function Animal({ type, animalColor }) {

    // if (type === 'racoon') {
    //     return (
    //         <div>
    //             <h1>RACOON</h1>
    //         </div>
    //     );
    // } else if (type === 'cat') {
    //     return (
    //         <div>
    //             <h1>CAT</h1>
    //         </div>
    //     );
    // } else {
    //     return (
    //         <div>
    //             <h1>ANIMAL</h1>
    //         </div>
    //     );
    // }

    return (
        <div>
            <h1 style={{
                color: animalColor,
                fontFamily: 'monospace',
                letterSpacing: '15px',
                }}>
                {
                    type === 'racoon'
                        ?
                        'RACOON'
                        :
                        type === 'cat'
                            ?
                            'CAT'
                            :
                            'ANIMAL'
                }
            </h1>
        </div>
    );
}

export default Animal