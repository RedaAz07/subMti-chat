import json
import random
import string
from faker import Faker

# Create Faker object
fake = Faker()

# Generate fake data
data_list = []
id = 1  # Initialize ID
for _ in range(3):  # Generate 10 sets of fake data
    # Generate CIN with a letter followed by 7 digits
    cin = random.choice(string.ascii_uppercase) + ''.join(random.choices(string.digits, k=7))

    data = {
        "id": id,  # Use the current ID
        "nom": fake.last_name(),
        "prenom": fake.first_name(),
        "CIN": cin,
        "dateNaissance": fake.date_of_birth(minimum_age=18, maximum_age=80).strftime("%Y-%m-%d"),
        "telephone": fake.phone_number(),
        "adresse": fake.address()
    }
    data_list.append(data)
    id += 1  # Increment ID

# Writing data to a JSON file
with open('data_admins.json', 'w') as json_file:
    json.dump(data_list, json_file, indent=4)
