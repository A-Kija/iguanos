import { createContext, useEffect, useState } from 'react';

export const AnimalContext = createContext();

export const AnimalProvider = ({ children, url }) => {

    const [lastRead, setLastRead] = useState(Date.now());
    const [animals, setAnimals] = useState(null);
    const [create, setCreate] = useState(null);
    const [edit, setEdit] = useState(null);
    const [update, setUpdate] = useState(null);
    const [remove, setRemove] = useState(null);


    useEffect(_ => {
        axios.get(url.base + '/animals/list')
            .then(res => {
                console.log(res);
                setAnimals(res.data.animals);
            })
            .catch(err => {
                console.log(err);
            });
    }, [lastRead]);


    useEffect(_ => {
        if (null === create) {
            return;
        }
        axios.post(url.base + '/animals', create)
            .then(res => {
                console.log(res);
                setLastRead(Date.now());
            })
            .catch(err => {
                console.log(err);
            });
    }, [create]);

    // remove
    useEffect(_ => {
        if (null === remove) {
            return;
        }
        axios.delete(url.base + '/animals/' + remove.id)
            .then(res => {
                console.log(res);
                setLastRead(Date.now());
            })
            .catch(err => {
                console.log(err);
            });
    }, [remove]);

    //update
    useEffect(_ => {
        if (null === update) {
            return;
        }
        axios.put(url.base + '/animals/' + update.id, update)
            .then(res => {
                console.log(res);
                setLastRead(Date.now());
            })
            .catch(err => {
                console.log(err);
            });
    }, [update]);


    return (
        <AnimalContext.Provider value={{
            foodSelector: ['carnivore', 'herbivore', 'omnivore'],
            create, setCreate,
            update, setUpdate,
            remove, setRemove,
            edit, setEdit,
            url,
            animals
        }}>
            {children}
        </AnimalContext.Provider>
    );
}