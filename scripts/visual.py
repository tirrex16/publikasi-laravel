import requests
import matplotlib.pyplot as plt
import os  # Untuk memastikan folder public ada

try:
    # Request ke API
    response = requests.get('http://localhost:8000/api/articles/stats')
  # Update URL jika perlu
    response.raise_for_status()
    data = response.json()

    # Validasi kunci dalam JSON
    if 'published' not in data or 'unpublished' not in data:
        raise KeyError("Key 'published' or 'unpublished' missing in response JSON.")

    # Data untuk visualisasi
    labels = ['Published', 'Unpublished']
    values = [data['published'], data['unpublished']]

    # Buat pie chart
    plt.figure(figsize=(6, 6))
    plt.pie(values, labels=labels, autopct='%1.1f%%', startangle=140)
    plt.title('Article Publication Status')

    # Pastikan folder public ada
    save_path = '/Users/tirrex/publikasi/public/visualization.png'
    if not os.path.exists(os.path.dirname(save_path)):
        os.makedirs(os.path.dirname(save_path))

    # Simpan pie chart
    plt.savefig(save_path)
    print(f'Visualization saved to {save_path}')

except requests.exceptions.RequestException as e:
    print(f"Error fetching data from API: {e}")
except KeyError as e:
    print(f"Key Error in JSON response: {e}")
except ValueError:
    print("Invalid JSON received from API.")
except IOError as e:
    print(f"Error saving file: {e}")
