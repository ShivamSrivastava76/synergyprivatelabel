<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Template</title>
    <style>
        /* Add your styling here */
        .email-container {
            width: 600px;
            padding: 20px;
            border: 1px solid #ccc;
            margin: auto;
            background-color: #f8f9fa;
        }
        .email-header {
            background-color: #68594a;
            color: #fff;
            padding: 1px;
            text-align: center;
        }
        .email-body {
            margin-top: 10px;
        }
        /* Table statrt */
        table {
        width: 100%;
        border-collapse: collapse;
        }

        table, th, td {
        border: 1px solid #ddd;
        padding: 8px;
        }

        th {
        background-color: #f2f2f2;
        text-align: left;
        }

        tr:nth-child(even) {
        background-color: #f9f9f9;
        }

        tr:hover {
        background-color: #ddd;
        }

        td {
        text-align: left;
        }

        th, td {
        padding: 12px;
        }
        /* Table End */
        /* note style start */
        /* General Note Styling */

        /* Headers Styling */
        h1, h2, h3, h4, h5, h6 {
        font-family: 'Arial', sans-serif; /* More formal font for headers */
        margin: 10px 0;
        font-weight: bold;
        }

        h1 { font-size: 2rem; color: #cc0000; /* Red for emphasis */ }
        h2 { font-size: 1.75rem; color: #cc6600; /* Dark orange */ }
        h3 { font-size: 1.5rem; color: #cc9900; /* Yellowish */ }
        h4 { font-size: 1.25rem; color: #66cc00; /* Green */ }
        h5 { font-size: 1.1rem; color: #3399cc; /* Light blue */ }
        h6 { font-size: 1rem; color: #9933cc; /* Purple */ }

        /* Normal text */
        p {
        font-size: 1rem;
        line-height: 1.5;
        color: #333; /* Dark text for readability */
        margin-bottom: 10px;
        }

        /* Code block styling */
        code {
        background-color: #f4f4f4; /* Light gray background */
        color: #d63384; /* Magenta text */
        padding: 2px 5px;
        font-family: 'Courier New', monospace; /* Monospace for code */
        border-radius: 3px;
        border: 1px solid #ddd; /* Subtle border for code */
        }

        /* Blockquote styling */
        blockquote {
        background-color: #fff8dc; /* Light cream for quote */
        border-left: 5px solid #f7d308; /* Thicker left border */
        padding: 10px;
        font-style: italic;
        margin: 20px 0;
        color: #555; /* Lighter text for quotes */
        }

        /* Preformatted text block for code blocks */
        pre {
        background-color: #f4f4f4;
        padding: 10px;
        border: 1px solid #ddd;
        font-family: 'Courier New', monospace;
        overflow-x: auto;
        border-radius: 3px;
        color: #d63384;
        }
        .bold {
        font-weight: bold;
        }

        .italic {
        font-style: italic;
        }

        .underline {
        text-decoration: underline;
        }
        img {
        max-width: 100%;
        height: auto;
        display: block;
        margin: 0 auto; /* Centers the image */
        }

    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h2 style="color:#fffff;">Your Custom Email</h2>
        </div>
        <div class="email-body">
            {!! $content !!}
        </div>
    </div>
</body>
</html>
