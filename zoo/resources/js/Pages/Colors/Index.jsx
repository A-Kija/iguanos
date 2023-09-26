export default function Index({ colors, size, title, auth, ziggy }) {

    console.log(auth, ziggy);

    return (
        <div>
            <h1>{title} Nice Colors!</h1>
            {
                colors.map((color, i) => (
                    <div key={i}>
                        <h2 style={{
                            color,
                            fontSize: `${size}px`
                            }}>{color}</h2>
                    </div>
                ))
            }
        </div>
    );
}

